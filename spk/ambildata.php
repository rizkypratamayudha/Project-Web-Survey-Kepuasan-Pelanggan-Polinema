<?php 
class AmbilData {
    public $db;
    protected $table = 't_responden_mahasiswa';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function alternative (){
        $result = $this->db->query("SELECT DISTINCT responden_prodi as Prodi FROM {$this->table}");
        return $result;
    }

    public function criteria() {
        $result = $this->db->query("SELECT soal_nama FROM m_survey_soal WHERE survey_id = 2");
        return  $result;
    }
    public function bobot() {
        $result = $this->db->query("SELECT * FROM bobot ORDER BY bobot ASC");
        return  $result;
    }
    public function dataolahan() {
        $result = $this->db->query("SELECT
    r.responden_mahasiswa_id AS id,
    r.responden_nama AS nama,
    r.responden_prodi AS prodi,
    MAX(CASE WHEN j.soal_id = 16 THEN b.bobot ELSE NULL END) AS 'C1',
    MAX(CASE WHEN j.soal_id = 17 THEN b.bobot ELSE NULL END) AS 'C2',
    MAX(CASE WHEN j.soal_id = 18 THEN b.bobot ELSE NULL END) AS 'C3',
    MAX(CASE WHEN j.soal_id = 19 THEN b.bobot ELSE NULL END) AS 'C4',
    MAX(CASE WHEN j.soal_id = 20 THEN b.bobot ELSE NULL END) AS 'C5',
    MAX(CASE WHEN j.soal_id = 21 THEN b.bobot ELSE NULL END) AS 'C6',
    MAX(CASE WHEN j.soal_id = 22 THEN b.bobot ELSE NULL END) AS 'C7',
    MAX(CASE WHEN j.soal_id = 23 THEN b.bobot ELSE NULL END) AS 'C8',
    MAX(CASE WHEN j.soal_id = 24 THEN b.bobot ELSE NULL END) AS 'C9',
    MAX(CASE WHEN j.soal_id = 25 THEN b.bobot ELSE NULL END) AS 'C10',
    MAX(CASE WHEN j.soal_id = 26 THEN b.bobot ELSE NULL END) AS 'C11',
    MAX(CASE WHEN j.soal_id = 27 THEN b.bobot ELSE NULL END) AS 'C12',
    MAX(CASE WHEN j.soal_id = 28 THEN b.bobot ELSE NULL END) AS 'C13',
    MAX(CASE WHEN j.soal_id = 29 THEN b.bobot ELSE NULL END) AS 'C14',
    MAX(CASE WHEN j.soal_id = 30 THEN b.bobot ELSE NULL END) AS 'C15',
    MAX(CASE WHEN j.soal_id = 31 THEN b.bobot ELSE NULL END) AS 'C16',
    MAX(CASE WHEN j.soal_id = 32 THEN b.bobot ELSE NULL END) AS 'C17',
    MAX(CASE WHEN j.soal_id = 33 THEN b.bobot ELSE NULL END) AS 'C18'
FROM
    t_jawaban_mahasiswa j
JOIN
    t_responden_mahasiswa r ON j.responden_mahasiswa_id = r.responden_mahasiswa_id
LEFT JOIN
    bobot b ON j.jawaban = b.kepuasan
GROUP BY
    r.responden_mahasiswa_id, r.responden_nama, r.responden_prodi;

");
        return  $result;
    }

    public function dataolahan2(){
        $result = $this->db->query("SELECT
    prodi,
    SUM(C1) AS total_C1,
    SUM(C2) AS total_C2,
    SUM(C3) AS total_C3,
    SUM(C4) AS total_C4,
    SUM(C5) AS total_C5,
    SUM(C6) AS total_C6,
    SUM(C7) AS total_C7,
    SUM(C8) AS total_C8,
    SUM(C9) AS total_C9,
    SUM(C10) AS total_C10,
    SUM(C11) AS total_C11,
    SUM(C12) AS total_C12,
    SUM(C13) AS total_C13,
    SUM(C14) AS total_C14,
    SUM(C15) AS total_C15,
    SUM(C16) AS total_C16,
    SUM(C17) AS total_C17,
    SUM(C18) AS total_C18
FROM (
    SELECT
        r.responden_prodi AS prodi,
        MAX(CASE WHEN j.soal_id = 16 THEN b.bobot ELSE NULL END) AS C1,
        MAX(CASE WHEN j.soal_id = 17 THEN b.bobot ELSE NULL END) AS C2,
        MAX(CASE WHEN j.soal_id = 18 THEN b.bobot ELSE NULL END) AS C3,
        MAX(CASE WHEN j.soal_id = 19 THEN b.bobot ELSE NULL END) AS C4,
        MAX(CASE WHEN j.soal_id = 20 THEN b.bobot ELSE NULL END) AS C5,
        MAX(CASE WHEN j.soal_id = 21 THEN b.bobot ELSE NULL END) AS C6,
        MAX(CASE WHEN j.soal_id = 22 THEN b.bobot ELSE NULL END) AS C7,
        MAX(CASE WHEN j.soal_id = 23 THEN b.bobot ELSE NULL END) AS C8,
        MAX(CASE WHEN j.soal_id = 24 THEN b.bobot ELSE NULL END) AS C9,
        MAX(CASE WHEN j.soal_id = 25 THEN b.bobot ELSE NULL END) AS C10,
        MAX(CASE WHEN j.soal_id = 26 THEN b.bobot ELSE NULL END) AS C11,
        MAX(CASE WHEN j.soal_id = 27 THEN b.bobot ELSE NULL END) AS C12,
        MAX(CASE WHEN j.soal_id = 28 THEN b.bobot ELSE NULL END) AS C13,
        MAX(CASE WHEN j.soal_id = 29 THEN b.bobot ELSE NULL END) AS C14,
        MAX(CASE WHEN j.soal_id = 30 THEN b.bobot ELSE NULL END) AS C15,
        MAX(CASE WHEN j.soal_id = 31 THEN b.bobot ELSE NULL END) AS C16,
        MAX(CASE WHEN j.soal_id = 32 THEN b.bobot ELSE NULL END) AS C17,
        MAX(CASE WHEN j.soal_id = 33 THEN b.bobot ELSE NULL END) AS C18
    FROM
        t_jawaban_mahasiswa j   
    JOIN
        t_responden_mahasiswa r ON j.responden_mahasiswa_id = r.responden_mahasiswa_id
    LEFT JOIN
        bobot b ON j.jawaban = b.kepuasan
    GROUP BY
        r.responden_mahasiswa_id, r.responden_nama, r.responden_prodi
) AS subquery
GROUP BY
    prodi;
");

        return  $result;
    }

    public function vectorS(){
        $result = $this->db->query("SELECT
    prodi,
    ROUND(POW(SUM(C1), 0.0555), 3) AS total_C1,
    ROUND(POW(SUM(C2), 0.0555), 3) AS total_C2,
    ROUND(POW(SUM(C3), 0.0555), 3) AS total_C3,
    ROUND(POW(SUM(C4), 0.0555), 3) AS total_C4,
    ROUND(POW(SUM(C5), 0.0555), 3) AS total_C5,
    ROUND(POW(SUM(C6), 0.0555), 3) AS total_C6,
    ROUND(POW(SUM(C7), 0.0555), 3) AS total_C7,
    ROUND(POW(SUM(C8), 0.0555), 3) AS total_C8,
    ROUND(POW(SUM(C9), 0.0555), 3) AS total_C9,
    ROUND(POW(SUM(C10), 0.0555), 3) AS total_C10,
    ROUND(POW(SUM(C11), 0.0555), 3) AS total_C11,
    ROUND(POW(SUM(C12), 0.0555), 3) AS total_C12,
    ROUND(POW(SUM(C13), 0.0555), 3) AS total_C13,
    ROUND(POW(SUM(C14), 0.0555), 3) AS total_C14,
    ROUND(POW(SUM(C15), 0.0555), 3) AS total_C15,
    ROUND(POW(SUM(C16), 0.0555), 3) AS total_C16,
    ROUND(POW(SUM(C17), 0.0555), 3) AS total_C17,
    ROUND(POW(SUM(C18), 0.0555), 3) AS total_C18,
    ROUND(POW(SUM(C1), 0.0555) +
            POW(SUM(C2), 0.0555) +
            POW(SUM(C3), 0.0555) +
            POW(SUM(C4), 0.0555) +
            POW(SUM(C5), 0.0555) +
            POW(SUM(C6), 0.0555) +
            POW(SUM(C7), 0.0555) +
            POW(SUM(C8), 0.0555) +
            POW(SUM(C9), 0.0555) +
            POW(SUM(C10), 0.0555) +
            POW(SUM(C11), 0.0555) +
            POW(SUM(C12), 0.0555) +
            POW(SUM(C13), 0.0555) +
            POW(SUM(C14), 0.0555) +
            POW(SUM(C15), 0.0555) +
            POW(SUM(C16), 0.0555) +
            POW(SUM(C17), 0.0555) +
            POW(SUM(C18), 0.0555), 3) AS total_sum
FROM (
    SELECT
        r.responden_prodi AS prodi,
        MAX(CASE WHEN j.soal_id = 16 THEN b.bobot ELSE NULL END) AS C1,
        MAX(CASE WHEN j.soal_id = 17 THEN b.bobot ELSE NULL END) AS C2,
        MAX(CASE WHEN j.soal_id = 18 THEN b.bobot ELSE NULL END) AS C3,
        MAX(CASE WHEN j.soal_id = 19 THEN b.bobot ELSE NULL END) AS C4,
        MAX(CASE WHEN j.soal_id = 20 THEN b.bobot ELSE NULL END) AS C5,
        MAX(CASE WHEN j.soal_id = 21 THEN b.bobot ELSE NULL END) AS C6,
        MAX(CASE WHEN j.soal_id = 22 THEN b.bobot ELSE NULL END) AS C7,
        MAX(CASE WHEN j.soal_id = 23 THEN b.bobot ELSE NULL END) AS C8,
        MAX(CASE WHEN j.soal_id = 24 THEN b.bobot ELSE NULL END) AS C9,
        MAX(CASE WHEN j.soal_id = 25 THEN b.bobot ELSE NULL END) AS C10,
        MAX(CASE WHEN j.soal_id = 26 THEN b.bobot ELSE NULL END) AS C11,
        MAX(CASE WHEN j.soal_id = 27 THEN b.bobot ELSE NULL END) AS C12,
        MAX(CASE WHEN j.soal_id = 28 THEN b.bobot ELSE NULL END) AS C13,
        MAX(CASE WHEN j.soal_id = 29 THEN b.bobot ELSE NULL END) AS C14,
        MAX(CASE WHEN j.soal_id = 30 THEN b.bobot ELSE NULL END) AS C15,
        MAX(CASE WHEN j.soal_id = 31 THEN b.bobot ELSE NULL END) AS C16,
        MAX(CASE WHEN j.soal_id = 32 THEN b.bobot ELSE NULL END) AS C17,
        MAX(CASE WHEN j.soal_id = 33 THEN b.bobot ELSE NULL END) AS C18
    FROM
        t_jawaban_mahasiswa j   
    JOIN
        t_responden_mahasiswa r ON j.responden_mahasiswa_id = r.responden_mahasiswa_id
    LEFT JOIN
        bobot b ON j.jawaban = b.kepuasan
    GROUP BY
        r.responden_mahasiswa_id, r.responden_nama, r.responden_prodi
) AS subquery
GROUP BY
    prodi;

");

        return  $result;

    }

    public function vectorV(){
        $result = $this->db->query("WITH total_sum_subquery AS (
    SELECT
        prodi,
            ROUND(POW(SUM(C1), 0.0555) +
                POW(SUM(C2), 0.0555) +
                POW(SUM(C3), 0.0555) +
                POW(SUM(C4), 0.0555) +
                POW(SUM(C5), 0.0555) +
                POW(SUM(C6), 0.0555) +
                POW(SUM(C7), 0.0555) +
                POW(SUM(C8), 0.0555) +
                POW(SUM(C9), 0.0555) +
                POW(SUM(C10), 0.0555) +
                POW(SUM(C11), 0.0555) +
                POW(SUM(C12), 0.0555) +
                POW(SUM(C13), 0.0555) +
                POW(SUM(C14), 0.0555) +
                POW(SUM(C15), 0.0555) +
                POW(SUM(C16), 0.0555) +
                POW(SUM(C17), 0.0555) +
                POW(SUM(C18), 0.0555), 3) AS total_sum
    FROM (
        SELECT
            r.responden_prodi AS prodi,
            MAX(CASE WHEN j.soal_id = 16 THEN b.bobot ELSE NULL END) AS C1,
            MAX(CASE WHEN j.soal_id = 17 THEN b.bobot ELSE NULL END) AS C2,
            MAX(CASE WHEN j.soal_id = 18 THEN b.bobot ELSE NULL END) AS C3,
            MAX(CASE WHEN j.soal_id = 19 THEN b.bobot ELSE NULL END) AS C4,
            MAX(CASE WHEN j.soal_id = 20 THEN b.bobot ELSE NULL END) AS C5,
            MAX(CASE WHEN j.soal_id = 21 THEN b.bobot ELSE NULL END) AS C6,
            MAX(CASE WHEN j.soal_id = 22 THEN b.bobot ELSE NULL END) AS C7,
            MAX(CASE WHEN j.soal_id = 23 THEN b.bobot ELSE NULL END) AS C8,
            MAX(CASE WHEN j.soal_id = 24 THEN b.bobot ELSE NULL END) AS C9,
            MAX(CASE WHEN j.soal_id = 25 THEN b.bobot ELSE NULL END) AS C10,
            MAX(CASE WHEN j.soal_id = 26 THEN b.bobot ELSE NULL END) AS C11,
            MAX(CASE WHEN j.soal_id = 27 THEN b.bobot ELSE NULL END) AS C12,
            MAX(CASE WHEN j.soal_id = 28 THEN b.bobot ELSE NULL END) AS C13,
            MAX(CASE WHEN j.soal_id = 29 THEN b.bobot ELSE NULL END) AS C14,
            MAX(CASE WHEN j.soal_id = 30 THEN b.bobot ELSE NULL END) AS C15,
            MAX(CASE WHEN j.soal_id = 31 THEN b.bobot ELSE NULL END) AS C16,
            MAX(CASE WHEN j.soal_id = 32 THEN b.bobot ELSE NULL END) AS C17,
            MAX(CASE WHEN j.soal_id = 33 THEN b.bobot ELSE NULL END) AS C18
        FROM
            t_jawaban_mahasiswa j   
        JOIN
            t_responden_mahasiswa r ON j.responden_mahasiswa_id = r.responden_mahasiswa_id
        LEFT JOIN
            bobot b ON j.jawaban = b.kepuasan
        GROUP BY
            r.responden_mahasiswa_id, r.responden_nama, r.responden_prodi
    ) AS subquery
    GROUP BY
        prodi
),
total_sum_all_prodi AS (
    SELECT SUM(total_sum) AS total_sum
    FROM total_sum_subquery
)
SELECT
    t.prodi,
    ROUND(AVG(t.total_sum) / (SELECT total_sum FROM total_sum_all_prodi), 5) AS average_total_sum
FROM total_sum_subquery t
GROUP BY t.prodi
ORDER BY average_total_sum DESC;

");

        return  $result;
    }


}
?>