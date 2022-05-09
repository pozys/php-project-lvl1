install: # Установка зависимостей
	composer install

brain-games: # Запуск программы
	php ./bin/brain-games

validate: # Валидация пакета
	composer validate

lint: # Проверка качества кода линтером
	composer exec --verbose phpcs -- --standard=PSR12 src bin
