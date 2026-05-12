.PHONY: dev open phpstorm run wait check_docker

dev: phpstorm run wait

open: run wait

phpstorm:
	phpstorm ${PWD}

run: check_docker
	docker run --rm -it -v ${PWD}/public_html:/usr/share/nginx/html:ro -p 8000:80 nginx

wait:
	while ! curl -fs http://localhost:8000 > /dev/null; do \
		sleep 1; \
	done
	open "http://localhost:8000"

check_docker:
	@if ! docker info > /dev/null 2>&1; then \
		echo "Docker is not running. Attempting to start Docker..."; \
		if [ "$$(uname)" = "Darwin" ]; then \
			open -g -a Docker; \
			echo "Waiting for Docker to start..."; \
			while ! docker info > /dev/null 2>&1; do \
				sleep 1; \
			done; \
		else \
			echo "Unsupported OS. Please start Docker manually."; \
			exit 1; \
		fi; \
	fi

MAKEFLAGS += -j