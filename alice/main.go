// Copyright © 2021 Kris Nóva <kris@nivenly.com>
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
//   ███╗   ██╗ █████╗ ███╗   ███╗██╗
//   ████╗  ██║██╔══██╗████╗ ████║██║
//   ██╔██╗ ██║███████║██╔████╔██║██║
//   ██║╚██╗██║██╔══██║██║╚██╔╝██║██║
//   ██║ ╚████║██║  ██║██║ ╚═╝ ██║███████╗
//   ╚═╝  ╚═══╝╚═╝  ╚═╝╚═╝     ╚═╝╚══════╝
//

package main

import (
	"context"
	"fmt"
	"os"

	"k8s.io/apimachinery/pkg/util/intstr"

	appsv1 "k8s.io/api/apps/v1"
	corev1 "k8s.io/api/core/v1"
	metav1 "k8s.io/apimachinery/pkg/apis/meta/v1"

	"github.com/hexops/valast"
	"github.com/kris-nova/naml"
	"k8s.io/client-go/kubernetes"
)

var Version string = "0.0.1"

func main() {
	// Load the application into the NAML registery
	// Note: naml.Register() can be used multiple times.
	naml.Register(NewApp("nivenly", "The official source code of nivenly.com"))

	// Run the generic naml command line program with
	// the application loaded.
	err := naml.RunCommandLine()
	if err != nil {
		fmt.Println(err.Error())
		os.Exit(1)
	}
}

// App is a very important grown up business application.
type App struct {
	metav1.ObjectMeta
	description string
	// ----------------------------------
	// Add your configuration fields here
	// ----------------------------------
}

// NewApp will create a new instance of App.
//
// See https://github.com/naml-examples for more examples.
//
// This is where you pass in fields to your application (similar to Values.yaml)
// Example: func NewApp(name string, example string, something int) *App
func NewApp(name, description string) *App {
	return &App{
		description: description,
		ObjectMeta: metav1.ObjectMeta{
			Name:            name,
			ResourceVersion: Version,
		},
		// ----------------------------------
		// Add your configuration fields here
		// ----------------------------------
	}
}

func (a *App) Install(client *kubernetes.Clientset) error {
	var err error

	// Adding a deployment: "nivenly"
	nivenlyDeployment := &appsv1.Deployment{
		TypeMeta: metav1.TypeMeta{
			Kind:       "Deployment",
			APIVersion: "apps/appsv1",
		},
		ObjectMeta: metav1.ObjectMeta{
			Name:        "nivenly",
			Namespace:   "public",
			Generation:  1,
			Labels:      map[string]string{"app": "nivenly"},
			Annotations: map[string]string{"deployment.kubernetes.io/revision": "1"},
		},
		Spec: appsv1.DeploymentSpec{
			Replicas: valast.Addr(int32(1)).(*int32),
			Selector: &metav1.LabelSelector{MatchLabels: map[string]string{
				"app": "nivenly",
			}},
			Template: corev1.PodTemplateSpec{
				ObjectMeta: metav1.ObjectMeta{
					Labels: map[string]string{"app": "nivenly"},
				},
				Spec: corev1.PodSpec{
					Containers: []corev1.Container{corev1.Container{
						Name:  "nivenly",
						Image: "krisnova/nivenly.com:latest",
						Ports: []corev1.ContainerPort{corev1.ContainerPort{
							ContainerPort: 1313,
							Protocol:      corev1.Protocol("TCP"),
						}},
						Env: []corev1.EnvVar{
							corev1.EnvVar{
								Name:  "BJORNODIR",
								Value: "/public",
							},
							corev1.EnvVar{
								Name:  "BJORNO404PATH",
								Value: "/public/404.html",
							},
							corev1.EnvVar{
								Name:  "BJORNO500PATH",
								Value: "/public/404.html",
							},
							corev1.EnvVar{
								Name:  "BJORNO5XXPATH",
								Value: "/public/404.html",
							},
							corev1.EnvVar{
								Name:  "BJORNOUSEDEFAULT",
								Value: "false",
							},
						},
						TerminationMessagePath:   "/dev/termination-log",
						TerminationMessagePolicy: corev1.TerminationMessagePolicy("File"),
						ImagePullPolicy:          corev1.PullPolicy("Always"),
					}},
					RestartPolicy:                 corev1.RestartPolicy("Always"),
					TerminationGracePeriodSeconds: valast.Addr(int64(30)).(*int64),
					DNSPolicy:                     corev1.DNSPolicy("ClusterFirst"),
					HostNetwork:                   true,
					SecurityContext:               &corev1.PodSecurityContext{},
					SchedulerName:                 "default-scheduler",
				},
			},
			Strategy: appsv1.DeploymentStrategy{
				Type: appsv1.DeploymentStrategyType("RollingUpdate"),
				RollingUpdate: &appsv1.RollingUpdateDeployment{
					MaxUnavailable: &intstr.IntOrString{
						Type:   intstr.Type(1),
						StrVal: "25%",
					},
					MaxSurge: &intstr.IntOrString{
						Type:   intstr.Type(1),
						StrVal: "25%",
					},
				},
			},
			RevisionHistoryLimit:    valast.Addr(int32(10)).(*int32),
			ProgressDeadlineSeconds: valast.Addr(int32(600)).(*int32),
		},
	}

	_, err = client.AppsV1().Deployments("public").Create(context.TODO(), nivenlyDeployment, metav1.CreateOptions{})
	if err != nil {
		return err
	}

	nivenlyService := &corev1.Service{
		TypeMeta: metav1.TypeMeta{
			Kind:       "Service",
			APIVersion: "corev1",
		},
		ObjectMeta: metav1.ObjectMeta{
			Name:      "nivenly",
			Namespace: "public",
			Labels:    map[string]string{"app": "nivenly"},
		},
		Spec: corev1.ServiceSpec{
			Ports: []corev1.ServicePort{corev1.ServicePort{
				Protocol:   corev1.Protocol("TCP"),
				Port:       1313,
				TargetPort: intstr.IntOrString{IntVal: 1313},
				NodePort:   30000,
			}},
			Selector:              map[string]string{"app": "nivenly"},
			Type:                  corev1.ServiceType("NodePort"),
			SessionAffinity:       corev1.ServiceAffinity("None"),
			ExternalTrafficPolicy: corev1.ServiceExternalTrafficPolicyType("Cluster"),
		},
	}

	_, err = client.CoreV1().Services("public").Create(context.TODO(), nivenlyService, metav1.CreateOptions{})
	if err != nil {
		return err
	}

	return err
}

func (a *App) Uninstall(client *kubernetes.Clientset) error {
	var err error

	err = client.AppsV1().Deployments("public").Delete(context.TODO(), "nivenly", metav1.DeleteOptions{})
	if err != nil {
		return err
	}

	err = client.CoreV1().Services("public").Delete(context.TODO(), "nivenly", metav1.DeleteOptions{})
	if err != nil {
		return err
	}

	return err
}

func (a *App) Description() string {
	return a.description
}

func (a *App) Meta() *metav1.ObjectMeta {
	return &a.ObjectMeta
}
