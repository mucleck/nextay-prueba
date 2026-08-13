# --- Stage 1: build the SPA ---
FROM node:22-alpine AS build

WORKDIR /app

COPY . .
RUN npm ci
RUN npm run build

# --- Stage 2: serve with nginx ---
FROM nginx:alpine

COPY --from=build /app/dist/spa /usr/share/nginx/html
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
