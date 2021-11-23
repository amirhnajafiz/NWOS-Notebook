# Laravel Message Broker

Create a message broker and mail sender with Laravel using **Apache Kafka**, and **MailGun**.

In this project we use Jobs and Queues to send email notifications by MailGun to our users.

## Features
### Back-end
- Using laravel form request
- Restful API
- MySQL database 
- Job and Queue 
- Apache Kafka Queue
- MailGun connection

### Front-end
- Next.js
- React.js

## Routes 
Register a user:
- path: /user
- method: POST
- Request:
```json
{
  "name" : "string",
  "email" : "string",
  "password" : "string"
}
```
- Response:
```json
{
  "user" : "id",
  "status" : "successfully registered"
}
```

Calling a user:
- path: /notify
- method: POST
- Request:
```json
{
  "message" : "string",
  "date" : "date",
  "user_id" : "int",
  "to_id" : "int"
}
```
- Response:
```json
{
  "user" : "int",
  "notify" : "success",
  "notify_id" : "int"
}
```

Remove a user:
- path: /user
- method: DELETE
- Request:
```json
{
  "id" : "int",
  "password" : "string"
}
```
- Response:
```json
{
  "status" : "Deleted"
}
```
