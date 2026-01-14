<?php
// =======================
// LOGIC PHP
// =======================
$nama    = $_POST['nama']    ?? '';
$prodi   = $_POST['prodi']   ?? '';
$hobi    = $_POST['hobi']    ?? [];
$alamat  = $_POST['alamat']  ?? '';
$submit  = isset($_POST['submit']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pendaftaran Mahasantri | Enterprise System</title>

<style>
/* =======================
   ENTERPRISE DESIGN
======================= */
:root {
    --primary: #0f172a;
    --accent: #2563eb;
    --soft: #f1f5f9;
    --glass: rgba(255,255,255,.85);
}

* {
    box-sizing: border-box;
    font-family: 'Segoe UI', system-ui;
}

body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #020617, #1e293b);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.wrapper {
    max-width: 900px;
    width: 100%;
}

.card {
    background: var(--glass);
    border-radius: 18px;
    padding: 35px;
    box-shadow: 0 25px 60px rgba(0,0,0,.3);
    backdrop-filter: blur(12px);
}

h1 {
    margin: 0;
    color: var(--primary);
    font-size: 28px;
}

.subtitle {
    color: #475569;
    margin-bottom: 30px;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full {
    grid-column: 1 / -1;
}

label {
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 6px;
}

input, select, textarea {
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid #cbd5f5;
    font-size: 15px;
}

textarea {
    resize: none;
}

.checkbox-group {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.checkbox-group label {
    font-weight: normal;
}

button {
    margin-top: 25px;
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--accent), #1d4ed8);
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: .3s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(37,99,235,.5);
}

/* =======================
   RESULT CARD
======================= */
.result {
    margin-top: 30px;
    padding: 25px;
    border-radius: 16px;
    background: #020617;
    color: #e5e7eb;
}

.result h2 {
    margin-top: 0;
    color: #60a5fa;
}

.result span {
    color: #93c5fd;
}

/* =======================
   RESPONSIVE
======================= */
@media (max-width: 700px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>
<div class="wrapper">

    <div class="card">
        <h1>Form Pendaftaran Mahasantri</h1>
        <p class="subtitle">Sistem Enterprise Pendidikan Terintegrasi</p>

        <form method="POST">
            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" required>
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <select name="prodi" required>
                        <option value="">-- Pilih Program --</option>
                        <option value="PPL">PPL</option>
                        <option value="DM">DM</option>
                    </select>
                </div>

                <div class="form-group full">
                    <label>Hobi</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="hobi[]" value="Ngoding"> Ngoding</label>
                        <label><input type="checkbox" name="hobi[]" value="Desain"> Desain</label>
                        <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
                    </div>
                </div>

                <div class="form-group full">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3" required></textarea>
                </div>

            </div>

            <button type="submit" name="submit">Daftar Sekarang</button>
        </form>
    </div>

    <?php if ($submit): ?>
    <div class="result">
        <h2>Hasil Pendaftaran</h2>
        <p><span>Nama:</span> <?= htmlspecialchars($nama) ?></p>
        <p><span>Program Studi:</span> <?= htmlspecialchars($prodi) ?></p>
        <p><span>Hobi:</span> <?= $hobi ? implode(', ', $hobi) : 'Tidak dipilih' ?></p>
        <p><span>Alamat:</span> <?= htmlspecialchars($alamat) ?></p>
    </div>
    <?php endif; ?>

</div>
</body>
</html>
