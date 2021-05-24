# syntax = docker/dockerfile:1.2

FROM golang:latest
WORKDIR /go/src/github.com/kris-nova/nivenly.com
COPY app app
COPY main.go main.go
COPY go.mod go.sum ./
RUN \
    --mount=target=go-cache --mount=target=/root/.cache,type=cache \
    --mount=target=go-mod --mount=target=/go/pkg/mod,type=cache \
    CGO_ENABLED=0 GOOS=linux go build -installsuffix cgo -o /nivenly


FROM alpine:latest
RUN apk add nmap nmap-scripts
RUN apk --no-cache add ca-certificates
COPY public /public
COPY --from=0 /nivenly /nivenly
CMD ["/nivenly"]
