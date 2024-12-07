// تحديث صف
function updateRow(id) {
    const row = document.getElementById(`row-${id}`);
    const columns = row.querySelectorAll('[contenteditable="true"]');
    let data = {};
    columns.forEach((col) => {
        const columnName = col.getAttribute("data-column");
        data[columnName] = col.innerText.trim();
    });

    fetch("update_user.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, ...data }),
    })
        .then((res) => res.json())
        .then((response) => {
            if (response.success) {
                alert("Row updated successfully!");
            } else {
                alert("Error updating row!");
            }
        })
        .catch(() => alert("Something went wrong!"));
}

// حذف صف
function deleteRow(id) {
    if (!confirm("Are you sure you want to delete this row?")) return;

    fetch(`delete_user.php?id=${id}`, { method: "GET" })
        .then((res) => res.json())
        .then((response) => {
            if (response.success) {
                document.getElementById(`row-${id}`).remove();
                alert("Row deleted successfully!");
            } else {
                alert("Error deleting row!");
            }
        })
        .catch(() => alert("Something went wrong!"));
}

// نقل صف
function moveRow(id) {
    const row = document.getElementById(`row-${id}`);
    const movedTable = document.getElementById("movedTable");

    // نسخ الصف ونقله
    movedTable.appendChild(row.cloneNode(true));
    row.remove();
}

