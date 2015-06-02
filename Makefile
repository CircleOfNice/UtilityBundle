SHELL:=/bin/bash
ifndef LOGDIR
LOGDIR:=./logs
endif

all:
	@make -s setup
	@make -s build
	@make -s test
	@make -s docs
	@make -s install

setup:

build:
	composer install -o -vv -n --ansi 2>&1
test:
	phpunit -c phpunit.xml --coverage-html $(LOGDIR)/coverage
docs:

install:

