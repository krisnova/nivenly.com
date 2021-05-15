FROM golang:latest
WORKDIR /go/src/github.com/kris-nova/nivenly.com/app
COPY . .
RUN CGO_ENABLED=0 GOOS=linux go build -a -installsuffix cgo -o /app app/main.go

# --- Multistage
FROM alpine:latest
RUN apk --no-cache add ca-certificates
COPY public /public
COPY --from=0 /app /app
CMD ["/app"]