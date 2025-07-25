# Mister Quiz – Development Log

> **A Laravel-based quiz game inspired by "Who Wants to Be a Millionaire?", featuring user registration, XP tracking, category-based scoring, and a leaderboard.**

Personal development log for building the Laravel-based quiz game project.

---

# ✅ Project Setup
## Date: July 22, 2025
## Goal: Project Setup

### 🧱 Environment

- OS: Ubuntu/Linux
- PHP: 8.3.6
- Composer: 2.8.10
- Laravel: 8.x (via `composer install`)
- Git: initialized and linked to GitHub
---

## 📦 Laravel Setup Steps

1. ✅ Downloaded project zip and extracted to `~/projects/mister-quiz`
2. ✅ Installed Composer locally:
   ```bash
   php composer-setup.php
   mv composer.phar ~/.local/bin/composer
   echo 'export PATH="$HOME/.local/bin:$PATH"' >> ~/.bashrc
   source ~/.bashrc

3. ✅ Installed Laravel dependencies:
```bash
composer install

# At this time i ran through dependecy issues since my php version 8.3.6 was not compatible with the dependecies versions. The next step was to install MySQL then i do Laravel version upgrade.

# if you need to avoid this just instal atmost php 8.0 as per the composer.json. I prefered keeping it since i was to upgrade my Laravel.
```
4. ✅ The Created .env file was fine but if lacking you can use:
```bash
cp .env.example .env 
```

### 🔧 Git + GitHub Setup
#### 🔹 Initialize Local Git Repo

#### 🔹 Create GitHub Repository

    Go to https://github.com/new

    Create a new repository named mister-quiz

    Leave README, .gitignore, and license unchecked

#### 🔹 Link Remote and Push Code

```bash
git remote add origin https://github.com/stkisengese/mister-quiz.git
git branch -M main
git push -u origin main
```

### 🐛 Issues Encountered
    Date	Issue	Solution
    2025-07-22	Composer not globally available	Installed as composer.phar locally
    2025-07-22	composer not in PATH	Moved to ~/.local/bin + updated .bashrc
    2025-07-22	Missing .env file	Copied from .env.example
    TBD	

### 📌 Useful Artisan Commands

```bash
php artisan make:controller QuizController
php artisan make:model Question -m
php artisan migrate
php artisan serve
php artisan route:list
```

### 🧠 Learning Goals

    Laravel routing & controller architecture

    Blade template syntax and components

    Form validation and CSRF handling

    Eloquent relationships and query building

    Flash messages & redirect handling

---

## 📥 Added MySQL (manually extracted and initialized)

## Navigate to your preferred temp directory

```bash
cd ~/temp

 #Download MySQL tarball (example URL, adjust based on your version/platform)
 wget https://dev.mysql.com/get/Downloads/MySQL-8.4/mysql-8.4.6-linux-glibc2.28-x86_64.tar.xz

# Extract and move to opt
tar -xf mysql-8.4.6-linux-glibc2.28-x86_64.tar.xz
mv mysql-8.4.6-linux-glibc2.28-x86_64 ~/opt/mysql

# Confirm installation
~/opt/mysql/bin/mysql --version
~/opt/mysql/bin/mysqld --version

🔗 Set up PATH and LD_LIBRARY_PATH in .bashrc

# Add to ~/.bashrc
export PATH="$HOME/opt/mysql/bin:$PATH"
export LD_LIBRARY_PATH="$HOME/opt/lib:$LD_LIBRARY_PATH"

Then run:

source ~/.bashrc
```
---

# 🐬 MySQL Setup (Local Development)

   ## Date: 2025-07-23
   ## ✅ Added MySQL server (v8.4.6) with local install & isolated data dir & 📦 Installed libaio manually (MySQL dependency)

### 🛠️ Resolving libaio.so.1 Dependency

The mysqld server initially failed to start due to a missing libaio.so.1 shared library. This was resolved by:

  -  Downloading the libaio1 .deb package for Ubuntu 24.04 (libaio1_0.3.112-5_amd64.deb).

  -  Extracting libaio.so.1 from the .deb file using dpkg -x.

  -  Copying libaio.so.1 to the MySQL installation's lib directory: $HOME/opt/mysql/lib/.

  -  Ensuring $HOME/opt/mysql/lib is in LD_LIBRARY_PATH in ~/.bashrc.

```bash
mkdir -p ~/temp/libaio
cd ~/temp/libaio
wget http://archive.ubuntu.com/ubuntu/pool/main/liba/libaio/libaio1_0.3.112-5_amd64.deb
dpkg-deb -x libaio1_0.3.112-5_amd64.deb .
mkdir -p $HOME/opt/mysql/lib
cp -P ./usr/lib/x86_64-linux-gnu/libaio.so.* $HOME/opt/mysql/lib/
export LD_LIBRARY_PATH="$HOME/opt/mysql/lib:$LD_LIBRARY_PATH"
```

#### Also added this line to ~/.bashrc for persistence:

```bash
export LD_LIBRARY_PATH="$HOME/opt/mysql/lib:$LD_LIBRARY_PATH"
```

### 📁 Initialized MySQL data directory

```bash
mkdir -p "$HOME/mysql_data"

$HOME/opt/mysql/bin/mysqld --initialize \
  --datadir=$HOME/mysql_data \
  --basedir=$HOME/opt/mysql

#This generated a temporary root password, shown in the logs (but was reset below).
```

### 🚀 Started MySQL server manually

```bash
$HOME/opt/mysql/bin/mysqld \
  --datadir=$HOME/mysql_data \
  --basedir=$HOME/opt/mysql \
  --socket=$HOME/mysql_data/mysql.sock \
  --port=3306 \
  --bind-address=127.0.0.1 \
  --skip-networking=0

  # The above will run in the foreground, to run in background replace the last line as below where it logs output to 'mysql.log'

   --skip-networking=0 > "$HOME/mysql_data/mysql.log" 2>&1 &
```

### Flags Explained:

  -  **--datadir**: Essential, specifies data storage location.

  -  **--basedir**: Specifies installation base (can often be omitted if mysqld is run from bin).

  -  **--socket**: Defines the Unix socket path for local connections (important for client connection).

  -  **--port**: Sets the TCP/IP listening port (default is 3306, can be omitted if default).

  -  **--bind-address**: Restricts connections to localhost (127.0.0.1) for security.

  -  **--skip-networking=0**: Explicitly enables networking (can be omitted as this is usually default).

  -  **> "$HOME/mysql_data/mysql.log" 2>&1 &**: Redirects all output (stdout and stderr) to a log file and runs the process in the background.

### Simplified Start Command (Future/Preferred):
- After initial setup and verifying configuration, the command can be shortened:

```Bash

mysqld \
  --datadir=$HOME/mysql_data \
  --socket=$HOME/mysql_data/mysql.sock \
  --bind-address=127.0.0.1 \
  > "$HOME/mysql_data/mysql.log" 2>&1 &
```


### 🔑 Connected to MySQL and set development password

```bash
$HOME/opt/mysql/bin/mysql -u root -p \
  --socket=$HOME/mysql_data/mysql.sock

#simply shortened
mysql -u root -p --socket=$HOME/mysql_data/mysql.sock
```

#### Inside MySQL prompt:

**Action Taken:**
- Set a password for the root user in MySQL for initial security:

```SQL

ALTER USER 'root'@'localhost' IDENTIFIED BY 'xxxxxxxxx'; -- Replaced <your password here>
FLUSH PRIVILEGES;

-- Next Security Step (Highly Recommended): Creating a Dedicated Database User for Laravel

-- To adhere to the principle of least privilege, a dedicated user for the mister_quiz project will be created later and used by Laravel instead of root.


--  🗃️ Created project database

CREATE DATABASE mister_quiz CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
SHOW DATABASES;

--  Output:

+--------------------+
| Database           |
+--------------------+
| information_schema |
| mister_quiz        |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
```

### ⚙️ Updated .env file

```php
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mister_quiz
DB_USERNAME=root
DB_PASSWORD=xxxxxxxxx //add password which was generated or add the newone you changed
DB_SOCKET=/home/skisenge/mysql_data/mysql.sock // Optional
```

#### Also verified mysql --version and mysqld --version are pointing to the installed version inside ~/opt/mysql.

```bash
which mysql
mysql --version
mysqld --version
```

---
---

# 🔐 Security & User Management

  ##  Date: July 25, 2025
  ## Goal: Create a dedicated user (mister_quiz_user) for Laravel and verify permissions.

- Current .env uses root with a set password:

```PHP

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mister_quiz
DB_USERNAME=root
DB_PASSWORD=xxxxxxxxx // Password for root
DB_SOCKET=/home/skisenge/mysql_data/mysql.sock // Optional but used
```

#### Steps to be performed:

## 1. Connect to MySQL as root:

```Bash
mysql -u root -p --socket="$HOME/mysql_data/mysql.sock"
```
#### Create new user and grant permissions:

```SQL
CREATE USER 'mister_quiz_user'@'localhost' IDENTIFIED BY 'your_choice-set_password';
GRANT ALL PRIVILEGES ON mister_quiz.* TO 'mister_quiz_user'@'localhost';
FLUSH PRIVILEGES;
```

## 2. Verify User Creation
- Check if the user exists:

```sql
SELECT User, Host FROM mysql.user WHERE User = 'mister_quiz_user';

-- ✅ Expected Output:
+-------------------+-----------+
| User              | Host      |
+-------------------+-----------+
| mister_quiz_user  | localhost |
+-------------------+-----------+
1 row in set (0.00 sec)
```
- Check granted privileges:

```sql
SHOW GRANTS FOR 'mister_quiz_user'@'localhost';

-- ✅ Expected Output:
+---------------------------------------------------------------------------+
| Grants for mister_quiz_user@localhost                                     |
+---------------------------------------------------------------------------+
| GRANT USAGE ON *.* TO `mister_quiz_user`@`localhost`                      |
| GRANT ALL PRIVILEGES ON `mister_quiz`.* TO `mister_quiz_user`@`localhost` |
+---------------------------------------------------------------------------+
```

## 3. Test User Login & Database Access
- Exit MySQL and reconnect as the new user:

```bash
exit  # Exit root session
mysql -u mister_quiz_user -p --socket="$HOME/mysql_data/mysql.sock"
# enter password prompt
```
- Verify accessible databases:

```sql
SHOW DATABASES;

-- ✅ Expected Output:
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mister_quiz        |  -- Only this + system DBs visible
| performance_schema |
+--------------------+
```
#### Test mister_quiz access:

```sql
USE mister_quiz;
SHOW TABLES;  # Should work (empty if no tables yet)
CREATE TABLE test_access (id INT);  # Test write permissions
DROP TABLE test_access;  # Cleanup
```
## 4. Update Laravel .env
```php
DB_USERNAME=mister_quiz_user
DB_PASSWORD=<add password here>
```
## 5. Final Checks
#### Confirm MySQL versions (optional):
```bash
which mysql
mysql --version
mysqld --version
```
### 🎉 Summary of Changes

    Created least-privilege user mister_quiz_user.
    Verified login, database access, and permissions.
    Updated Laravel to use non-root credentials.

### Next Steps:
   
    Restart Laravel to apply .env changes.
    Test Laravel database connectivity.

📝 Notes:

    Always use FLUSH PRIVILEGES; after permission changes.
    The user can only access mister_quiz (no mysql or sys DBs).

This ensures security while maintaining functionality. 🚀

*This ensures the Laravel application connects with limited privileges, enhancing overall security.*
---