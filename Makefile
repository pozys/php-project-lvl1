install: # Установка зависимостей
	composer install

brain-games: # Запуск программы
	php ./bin/brain-games

validate: # Валидация пакета
	composer validate
