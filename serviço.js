document.getElementById('addRowBtn').addEventListener('click', function() {
    const table = document.getElementById('serviceTable').getElementsByTagName('tbody')[0];
    
    // Cria uma nova linha
    const newRow = table.insertRow();
    
    // Cria e adiciona células à nova linha
    const nameCell = newRow.insertCell(0);
    const contactCell = newRow.insertCell(1);
    const budgetCell = newRow.insertCell(2);
    const descriptionCell = newRow.insertCell(3);
    const dateCell = newRow.insertCell(4);
    const actionCell = newRow.insertCell(5);

    // Popula as células com campos de input
    nameCell.innerHTML = `<input type="text" placeholder="Nome">`;
    contactCell.innerHTML = `<input type="text" placeholder="Contato">`;
    budgetCell.innerHTML = `<input type="text" placeholder="Orçamento">`;
    descriptionCell.innerHTML = `<input type="text" placeholder="Especificação">`;
    dateCell.innerHTML = `<input type="date">`;
    actionCell.innerHTML = `<button class="delete-btn">Excluir</button>`;

    // Adiciona funcionalidade de exclusão à nova linha
    const deleteBtn = actionCell.querySelector('.delete-btn');
    deleteBtn.addEventListener('click', function() {
        table.deleteRow(newRow.rowIndex - 1); // Remove a linha quando o botão "Excluir" for clicado
    });
});


