#!/bin/bash
echo "Iniciando instalação..."
echo ""

# Subindo o backend.
cd backend
docker-compose up -d

docker exec -t app-php sh -c "
    cd html &&
    composer install &&
    cp .env.example .env &&
    php artisan key:generate &&
    php artisan migrate:fresh --seed
"

echo "Backend executando em: http://localhost:8000/"
read -p "Pressione um botão para continuar..."

# Subindo o frontend.
cd ..
cd frontend
npm install
npm run dev

echo "Frontend executando em: http://localhost:8080/"
read -p "Pressione um botão para encerrar..."
