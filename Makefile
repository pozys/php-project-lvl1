install: # Установка зависимостей
	composer install

brain-games: # Запуск программы
	./bin/brain-games

brain-even: # Запуск игры "Проверка на чётность"
	./bin/brain-even

brain-calc: # Запуск игры "Калькулятор"
	./bin/brain-calc

brain-gcd: # Запуск игры "НОД"
	./bin/brain-gcd

brain-progression: # Запуск игры "Арифметическая прогрессия"
	./bin/brain-progression

brain-prime: # Запуск игры "Простое ли число?"
	./bin/brain-prime

validate: # Валидация пакета
	composer validate

lint: # Проверка качества кода линтером
	composer exec --verbose phpcs -- --standard=PSR12 src bin
