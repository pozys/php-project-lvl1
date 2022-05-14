install: # Установка зависимостей
	composer install

brain-games: # Запуск программы
	./bin/brain-games

brain-even: # Запуск игры "Проверка на чётность"
	./bin/brain-even

brain-calc: # Запуск игры "Калькулятор"
	./bin/brain-calc

validate: # Валидация пакета
	composer validate

lint: # Проверка качества кода линтером
	composer exec --verbose phpcs -- --standard=PSR12 src bin
