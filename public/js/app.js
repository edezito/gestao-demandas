const API = 'http://127.0.0.1:8000/api';

/* =========================
   PROJECTS
========================= */

async function loadProjects(page = 1) {
    try {
        const q = document.getElementById('search')?.value || '';
        const res = await fetch(`${API}/projects?q=${q}&page=${page}`);

        if (!res.ok) throw new Error('Erro ao buscar projetos');

        const data = await res.json();
        const container = document.getElementById('projects');
        if (!container) return;

        container.innerHTML = '';

        const projects = data.data || [];

        if (projects.length === 0) {
            container.innerHTML = `<p>Nenhum projeto encontrado.</p>`;
            return;
        }

        projects.forEach(p => {
            container.innerHTML += `
                <div class="card">
                    <b>${p.name}</b><br>
                    ${p.description ?? ''}<br><br>
                    <button onclick="deleteProject(${p.id})">Excluir</button>
                    <a href="/tickets/${p.id}">Ver Tickets</a>
                </div>
            `;
        });

        renderPagination(data.meta, page);

    } catch (err) {
        console.error(err);
        const container = document.getElementById('projects');
        if (container) {
            container.innerHTML = `<p>Erro ao carregar projetos.</p>`;
        }
    }
}

async function createProject() {
    try {
        const name = document.getElementById('name')?.value;
        const description = document.getElementById('description')?.value;

        if (!name) {
            alert('Nome é obrigatório');
            return;
        }

        const res = await fetch(`${API}/projects`, {
            method: 'POST',
            headers:
            {'Content-Type':'application/json'},
            'Accept': 'application/json',
            body: JSON.stringify({ name, description })
        });

        if (!res.ok) throw new Error('Erro ao criar projeto');

        document.getElementById('name').value = '';
        document.getElementById('description').value = '';

        loadProjects();

    } catch (err) {
        console.error(err);
        alert('Erro ao criar projeto');
    }
}

async function deleteProject(id) {
    if (!confirm('Deseja realmente excluir este projeto?')) return;

    try {
        const res = await fetch(`${API}/projects/${id}`, { method: 'DELETE' });

        if (!res.ok) throw new Error('Erro ao excluir projeto');

        loadProjects();

    } catch (err) {
        console.error(err);
        alert('Erro ao excluir projeto');
    }
}

/* =========================
   TICKETS
========================= */

async function loadTickets(projectId) {
    try {
        const res = await fetch(`${API}/projects/${projectId}/tickets`);

        if (!res.ok) throw new Error('Erro ao buscar tickets');

        const data = await res.json();
        const container = document.getElementById('tickets');
        if (!container) return;

        container.innerHTML = '';

        const tickets = data.data || data;

        if (tickets.length === 0) {
            container.innerHTML = `<p>Nenhum ticket encontrado.</p>`;
            return;
        }

        tickets.forEach(t => {
            container.innerHTML += `
                <div class="card">
                    <b>${t.title}</b><br>
                    ${t.description ?? ''}<br><br>
                    <button onclick="deleteTicket(${t.id})">Excluir</button>
                </div>
            `;
        });

    } catch (err) {
        console.error(err);
        const container = document.getElementById('tickets');
        if (container) {
            container.innerHTML = `<p>Erro ao carregar tickets.</p>`;
        }
    }
}

async function createTicket() {
    try {
        const title = document.getElementById('title')?.value;
        const description = document.getElementById('description')?.value;

        if (!title) {
            alert('Título é obrigatório');
            return;
        }

        const res = await fetch(`${API}/projects/${PROJECT_ID}/tickets`, {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify({ title, description })
        });

        if (!res.ok) throw new Error('Erro ao criar ticket');

        document.getElementById('title').value = '';
        document.getElementById('description').value = '';

        loadTickets(PROJECT_ID);

    } catch (err) {
        console.error(err);
        alert('Erro ao criar ticket');
    }
}

async function deleteTicket(id) {
    if (!confirm('Deseja realmente excluir este ticket?')) return;

    try {
        const res = await fetch(`${API}/tickets/${id}`, { method: 'DELETE' });

        if (!res.ok) throw new Error('Erro ao excluir ticket');

        loadTickets(PROJECT_ID);

    } catch (err) {
        console.error(err);
        alert('Erro ao excluir ticket');
    }
}

/* =========================
   PAGINATION
========================= */

function renderPagination(meta, currentPage) {
    if (!meta) return;

    let pag = document.getElementById('pagination');
    if (!pag) return;

    pag.innerHTML = '';

    for (let i = 1; i <= meta.last_page; i++) {
        pag.innerHTML += `
            <button 
                style="margin:3px; ${i === currentPage ? 'font-weight:bold' : ''}"
                onclick="loadProjects(${i})">
                ${i}
            </button>
        `;
    }
}

/* =========================
   AUTO LOAD
========================= */

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('projects')) {
        loadProjects();
    }

    if (typeof PROJECT_ID !== 'undefined') {
        loadTickets(PROJECT_ID);
    }
});