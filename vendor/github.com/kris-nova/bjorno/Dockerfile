FROM golang:latest
WORKDIR /go/src/github.com/kris-nova/bjorno
COPY . .
RUN CGO_ENABLED=0 GOOS=linux go build -a -installsuffix cgo -o /bjorno cmd/main.go

# --- Multistage
FROM alpine:latest
RUN apk add nmap
RUN apk --no-cache add ca-certificates
COPY --from=0 /bjorno /bjorno
CMD ["/bjorno"]