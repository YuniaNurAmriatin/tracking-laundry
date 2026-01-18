<form method="POST">
@csrf
<input name="kode"
       value="{{ $kode ?? '' }}"
       placeholder="Masukkan Kode Tracking"
       class="border p-2">
<button>Cek</button>
</form>