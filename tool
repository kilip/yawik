#!/usr/bin/env bash

UNAMEOUT="$(uname -s)"

WHITE='\033[1;37m'
NC='\033[0m'

# Verify operating system is supported...
case "${UNAMEOUT}" in
    Linux*)             MACHINE=linux;;
    Darwin*)            MACHINE=mac;;
    *)                  MACHINE="UNKNOWN"
esac

if [ "$MACHINE" == "UNKNOWN" ]; then
    echo "Unsupported operating system [$(uname -s)]. Laravel Sail supports macOS, Linux, and Windows (WSL2)." >&2

    exit 1
fi

# Source the ".env" file so symfony environment variables are available...
if [ -f ./api/.env ]; then
    source ./api/.env
fi

# Define environment variables...
export APP_PORT=${APP_PORT:-80}
export APP_SERVICE=${APP_SERVICE:-"php"}
export DB_PORT=${DB_PORT:-3306}
export WWWUSER=${WWWUSER:-$UID}
export WWWGROUP=${WWWGROUP:-$(id -g)}

# Function that outputs Sail is not running...
function yawik_is_not_running {
    echo -e "${WHITE}Sail is not running.${NC}" >&2
    echo "" >&2
    echo -e "${WHITE}You may Sail using the following commands:${NC} './yawik up' or './yawik up -d'" >&2

    exit 1
}

# Source the ".env" file so symfony environment variables are available...
if [ -f ./.env ]; then
    source ./.env
fi
if [ -z "${API_PLATFORM_ENV}" ]; then
    API_PLATFORM_ENV="dev"
fi

if [ -f ./.env ]; then
    source ./.env
fi

# start handling command args
COMPOSE_FILE="-f ./docker-compose.yml -f ./docker-compose.${API_PLATFORM_ENV}.yml"

if [ $# -gt 0 ]; then
    if [ "$1" == "build" ]; then
        echo -e "${WHITE}Build container images${NC}"
        docker-compose $COMPOSE_FILE build "${@: 2}"
    elif [ "$1" == "up" ]; then
        echo -e "${WHITE}Running api-platform in development mode${NC}"
        docker-compose ${COMPOSE_FILE} up "${@: 2}"
        exit 0
    else
        docker-compose "$@"
    fi
else
    docker-compose ps
fi
