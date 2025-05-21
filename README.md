
##  Features

- User Registration and Login with password hashing
- Create, Read, Update, Delete blog posts
- Session management for secure authentication

## Database Schema

### Database: `blog`

#### Table: "users"

| Column    | Type         | Description            |
|-----------|--------------|------------------------|
| id        | INT (PK)     | Auto-incremented ID    |
| username  | VARCHAR(100) | Unique username        |
| password  | VARCHAR(255) | Hashed password        |

#### Table: "posts"

| Column     | Type           | Description             |
|------------|----------------|-------------------------|
| id         | INT (PK)       | Auto-incremented ID     |
| title      | VARCHAR(255)   | Title of the post       |
| content    | TEXT           | Post content            |
| created_at | DATETIME       | Timestamp of creation   |

## 🔗 Links

- 🎥 [LinkedIn Video Demo](https://www.linkedin.com/posts/harika-vavilapalli-69010b367_apexplanet-php-mysql-activity-7331041815871012864-zwC_?utm_source=share&utm_medium=member_desktop&rcm=ACoAAFr2igwBm3u3oENrxKIPNBh6yJ3eYjS9fgY)
- 💾 [GitHub Repo](https://github.com/Harika-Vavilapalli/myproject)

---

## ✅ Task Completed for:
**ApexPlanet Internship - Task 2**

