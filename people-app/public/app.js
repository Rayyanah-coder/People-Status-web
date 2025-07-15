// public/app.js
const form  = document.getElementById('personForm');
const table = document.querySelector('#peopleTable tbody');

/* ---------- 1. handle form submit ---------- */
form.addEventListener('submit', async (e) => {
  e.preventDefault();

  // build form‑encoded body
  const data = new URLSearchParams();
  data.append('name', document.getElementById('name').value);
  data.append('age',  document.getElementById('age').value);

  // POST to insert.php
  await fetch('../api/insert.php', {
    method: 'POST',
    body: data
  });

  form.reset();         // clear inputs
  loadRows();           // refresh table
});

/* ---------- 2. fetch all rows and render ---------- */
async function loadRows() {
  const res  = await fetch('../api/list.php');
  const rows = await res.json();

  table.innerHTML = '';        // clear previous
  rows.forEach(r => {
    const tr = table.insertRow();
    tr.innerHTML = `
      <td>${r.id}</td>
      <td>${r.name}</td>
      <td>${r.age}</td>
      <td>${r.status}</td>
      <td><button data-id="${r.id}">Toggle</button></td>`;
  });
}

/* ---------- 3. delegate click → toggle ---------- */
table.addEventListener('click', async (e) => {
  if (!e.target.matches('button[data-id]')) return;   // not a toggle button

  const id = e.target.dataset.id;
  const body = new URLSearchParams();
  body.append('id', id);

  await fetch('../api/toggle.php', { method: 'POST', body });
  loadRows();          // refresh table
});

/* ---------- initial population ---------- */
loadRows();
