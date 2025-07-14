<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Gizi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f1f3f5;
        }
        .form-container {
            max-width: 650px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .result {
            background-color: #e9f7ef;
            padding: 20px;
            border-radius: 10px;
            margin-top: 25px;
            border-left: 5px solid #28a745;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    function selected($val, $option) {
        return $val === $option ? 'selected' : '';
    }
    ?>
    <div class="form-container">
        <h2 class="text-center mb-3">Kalkulator Gizi</h2>
        <p class="text-center text-muted">Hitung kebutuhan gizi harian Anda</p>
        
        <form method="post" class="mt-4">
            <div class="mb-3">
                <label for="gender" class="form-label fw-semibold">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="">Pilih</option>
                    <option value="Pria" <?= isset($input['gender']) && $input['gender'] == 'Pria' ? 'selected' : '' ?>>Pria</option>
                    <option value="Wanita" <?= isset($input['gender']) && $input['gender'] == 'Wanita' ? 'selected' : '' ?>>Wanita</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label fw-semibold">Usia (tahun)</label>
                <input type="number" name="age" id="age" class="form-control" min="1" required value="<?= isset($input['age']) ? $input['age'] : '' ?>">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label fw-semibold">Berat Badan (kg)</label>
                <input type="number" name="weight" id="weight" step="0.1" class="form-control" min="1" required value="<?= isset($input['weight']) ? $input['weight'] : '' ?>">
            </div>

            <div class="mb-3">
                <label for="height" class="form-label fw-semibold">Tinggi Badan (cm)</label>
                <input type="number" name="height" id="height" step="0.1" class="form-control" min="1" required value="<?= isset($input['height']) ? $input['height'] : '' ?>">
            </div>

            <div class="mb-4">
                <label for="activityLevel" class="form-label fw-semibold">Tingkat Aktivitas</label>
                <select name="activityLevel" id="activityLevel" class="form-select" required>
                    <option value="">Pilih</option>
                    <option value="rendah" <?= isset($input['activityLevel']) && $input['activityLevel'] == 'rendah' ? 'selected' : '' ?>>Rendah</option>
                    <option value="sedang" <?= isset($input['activityLevel']) && $input['activityLevel'] == 'sedang' ? 'selected' : '' ?>>Sedang</option>
                    <option value="tinggi" <?= isset($input['activityLevel']) && $input['activityLevel'] == 'tinggi' ? 'selected' : '' ?>>Tinggi</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-success btn-lg">Hitung</button>
            </div>
        </form>

        <?php if (isset($hasil)): ?>
            <div class="result mt-4">
                <h5 class="mb-3">Hasil Perhitungan Gizi</h5>
                <ul class="list-unstyled">
                    <li><strong>Kalori:</strong> <?= $hasil['kalori'] ?> kkal</li>
                    <li><strong>Protein:</strong> <?= $hasil['protein'] ?> gram</li>
                    <li><strong>Lemak:</strong> <?= $hasil['lemak'] ?> gram</li>
                    <li><strong>Karbohidrat:</strong> <?= $hasil['karbohidrat'] ?> gram</li>
                    <li><strong>Serat:</strong> <?= $hasil['serat'] ?> gram</li>
                    <li><strong>IMT (BMI):</strong> <?= $hasil['bmi'] ?> &mdash; <em><?= $hasil['kategori_bmi'] ?></em></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
