### Docker

Вы можете использовать этот проект с помощью **docker** и **docker-compose**:

**Минимальная версия Docker:**

- Engine: 18.03+
- Compose: 1.21+

**Команды:**

```bash
# Запустить API - это псевдоним для docker-compose up -d --build.
$ make up

# Проверить API.
$ curl http://localhost:8080

# Остановить и удалить контейнеры, псевдоним для docker-compose down.
$ make down
```
