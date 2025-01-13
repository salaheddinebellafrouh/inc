NAME=project

all: build up

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

clean:
	docker-compose down --volumes
	rm -rf ./data/db ./data/wp
