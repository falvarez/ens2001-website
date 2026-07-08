# Configuración de carpetas
SRC_CSS = public_html/css/bootstrap.min.css public_html/css/grayscale.css public_html/css/google-fonts.css public_html/css/font-awesome.css
SRC_JS  = public_html/js/jquery.js public_html/js/bootstrap.min.js public_html/js/jquery.easing.min.js public_html/js/grayscale.js

DIST_CSS = public_html/css/bundle.min.css
DIST_JS  = public_html/js/bundle.min.js

# Comando base de Docker
DOCKER_CMD = docker run --rm -v "$(shell pwd)":/work -w /work node:alpine

.PHONY: bundle clean dev open phpstorm run wait check_orbstack

bundle:
	@echo "Combining and minifying CSS..."
	@$(DOCKER_CMD) sh -c "cat $(SRC_CSS) | npx esbuild --minify --loader=css" > $(DIST_CSS)

	@echo "Combining and minifying JS..."
	@$(DOCKER_CMD) sh -c "cat $(SRC_JS) | npx esbuild --minify" > $(DIST_JS)
	@echo "Work done! Files generated at $(DIST_CSS) and $(DIST_JS)"

clean:
	rm -f $(DIST_CSS) $(DIST_JS)

dev: phpstorm run wait

open: run wait

phpstorm:
	phpstorm ${PWD}

run: check_orbstack
	docker run --rm -it -v ${PWD}/public_html:/usr/share/nginx/html:ro -p 8000:80 nginx

wait:
	while ! curl -fs http://localhost:8000 > /dev/null; do \
		sleep 1; \
	done
	open "http://localhost:8000"

check_orbstack:
	@if ! orbctl status 2>&1 | grep -q "Running"; then \
		echo "OrbStack is not running. Starting OrbStack..."; \
		orbctl start; \
		echo "Waiting for OrbStack to start..."; \
		while ! docker info > /dev/null 2>&1; do \
			sleep 1; \
		done; \
	fi

MAKEFLAGS += -j