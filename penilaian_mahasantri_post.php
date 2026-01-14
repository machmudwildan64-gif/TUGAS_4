<?php
// ============================
// LOGIC PHP (POST)
// ============================
$username   = $_POST['username']   ?? '';
$password   = $_POST['password']   ?? '';
$matkul     = $_POST['matkul']     ?? '';
$nilai      = $_POST['nilai']      ?? '';
$submit     = isset($_POST['submit']);

$status = '';
if ($submit && is_numeric($nilai)) {
    $status = ($nilai >= 80) ? 'LULUS' : 'TIDAK LULUS';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Penilaian Mahasantri | Enterprise Academic</title>

<style>
:root {
    --dark: #020617;
    --primary: #0f172a;
    --accent: #2563eb;
    --success: #16a34a;
    --danger: #dc2626;
    --glass: rgba(255,255,255,.88);
}

* {
    box-sizing: border-box;
    font-family: 'Segoe UI', system-ui;
}

body {
    margin: 0;
    min-height: 100vh;
    background: radial-gradient(circle at top, #1e293b, #020617);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 900px;
}

.card {
    background: var(--glass);
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 30px 70px rgba(0,0,0,.35);
    backdrop-filter: blur(14px);
}

h1 {
    margin: 0;
    color: var(--primary);
    font-size: 30px;
}

.subtitle {
    color: #475569;
    margin-bottom: 35px;
}

.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
}

.group {
    display: flex;
    flex-direction: column;
}

.group.full {
    grid-column: 1 / -1;
}

label {
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 6px;
}

input, select {
    padding: 13px 15px;
    border-radius: 12px;
    border: 1px solid #cbd5f5;
    font-size: 15px;
}

input[type="number"] {
    appearance: textfield;
}

button {
    margin-top: 30px;
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--accent), #1d4ed8);
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: .3s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(37,99,235,.5);
}

/* =====================
   RESULT
===================== */
.result {
    margin-top: 35px;
    padding: 30px;
    border-radius: 18px;
    background: var(--dark);
    color: #e5e7eb;
}

.result h2 {
    margin-top: 0;
    color: #60a5fa;
}

.badge {
    display: inline-block;
    padding: 8px 18px;
    border-radius: 999px;
    font-weight: bold;
    margin-top: 10px;
}

.lulus {
    background: var(--success);
}

.tidak {
    background: var(--danger);
}

/* =====================
   RESPONSIVE
===================== */
@media (max-width: 720px) {
    .grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>
<div class="container">

    <div class="card">
        <h1>Form Penilaian Mahasantri</h1>
        <p class="subtitle">Enterprise Academic Assessment System</p>

        <form method="POST">
            <div class="grid">

                <div class="group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>

                <div class="group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <div class="group">
                    <label>Mata Kuliah</label>
                    <select name="matkul" required>
                        <option value="">-- Pilih --</option>
                        <option value="DM">DM</option>
                        <option value="PPL">PPL</option>
                    </select>
                </div>

                <div class="group">
                    <label>Nilai</label>
                    <input type="number" name="nilai" min="0" max="100" required>
                </div>

            </div>

            <button type="submit" name="submit">Proses Penilaian</button>
        </form>
    </div>

    <?php if ($submit): ?>
    <div class="result">
        <h2>Hasil Evaluasi Mahasantri</h2>
        <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
        <p><strong>Mata Kuliah:</strong> <?= htmlspecialchars($matkul) ?></p>
        <p><strong>Nilai:</strong> <?= htmlspecialchars($nilai) ?></p>

        <div class="badge <?= $status === 'LULUS' ? 'lulus' : 'tidak' ?>">
            <?= $status ?>
        </div>
    </div>
    <?php endif; ?>

</div>
</body>
</html>
