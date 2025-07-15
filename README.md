# People-Status-app
A minimal PHP + MySQL + JS demo that lets you:  
1. Add a person (name + age)  
2. List everyone in a table  
3. Toggle each person’s `status` between **0 / 1** instantly via AJAX

Built for XAMPP on Windows but runs on any LAMP/MAMP/WAMP stack.

---

## ✨ Demo

<img src="https://raw.githubusercontent.com/your‑user/people-status-app/assets/demo.gif" width="720" alt="screenshot" />

---

## 📂 Project structure

people-status-app/
│
├─ public/ # Front‑end
│ ├─ index.html
│ ├─ styles.css
│ └─ app.js
│
└─ api/ # Back‑end
├─ db.php
├─ insert.php # POST name, age
├─ list.php # GET -> JSON rows
└─ toggle.php # POST id -> flips status
