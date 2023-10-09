// Ambil elemen dengan class "counter"
const counters = document.querySelectorAll('.counter');

// Fungsi untuk melakukan animasi menghitung
function startCounting() {
    counters.forEach(counter => {
        const target = +counter.innerText; // Ambil nilai target dari teks counter
        const increment = target / 100; // Hitung nilai increment per langkah

        let current = 0;

        // Jalankan animasi menghitung dengan interval
        const timer = setInterval(() => {
            current += increment;
            counter.innerText = Math.ceil(current); // Tampilkan nilai yang telah dihitung

            // Berhenti saat mencapai nilai target
            if (current >= target) {
                clearInterval(timer);
                counter.innerText = target;
            }
        }, 10);
    });
}

// Panggil fungsi untuk memulai animasi menghitung setelah elemen dimuat
window.addEventListener('load', startCounting);