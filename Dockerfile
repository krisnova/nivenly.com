FROM golang:latest
WORKDIR /go/src/github.com/kris-nova/nivenly.com/app/main
COPY app .
RUN CGO_ENABLED=0 GOOS=linux go build -a -installsuffix cgo -o /app/main/app


FROM alpine:latest
RUN apk --no-cache add ca-certificates
COPY public /public
COPY --from=0 /app /app
CMD ["/app/main/app"]