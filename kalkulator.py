def kalkulator():
    while True:  # Menggunakan loop agar program berjalan terus sampai pengguna memilih keluar
        print("--------------------")
        print("Pilih Menu:")
        print("0 - Keluar")
        print("1 - Penjumlahan")
        print("2 - Pengurangan")
        print("3 - Perkalian")
        print("4 - Pembagian")
        print("5,6,7... dll - Operasi lainnya (belum tersedia)")

        # Meminta input dari pengguna
        bilangan_1 = float(input("Masukkan bilangan pertama: "))
        bilangan_2 = float(input("Masukkan bilangan kedua: "))

        # Menampilkan menu operasi
        menu = int(input("Masukan Pilihan operasi (0-4): "))

        if menu == 0:
            print("Keluar dari program.")
            break  # Mengakhiri program

        elif menu == 1:
            hasil = bilangan_1 + bilangan_2
            print(f"Hasil penjumlahan: {hasil}")

        elif menu == 2:
            hasil = bilangan_1 - bilangan_2
            print(f"Hasil pengurangan: {hasil}")

        elif menu == 3:
            hasil = bilangan_1 * bilangan_2
            print(f"Hasil perkalian: {hasil}")

        elif menu == 4:
            if bilangan_2 != 0:
                hasil = bilangan_1 / bilangan_2
                print(f"Hasil pembagian: {hasil}")
            else: 
                print("Tidak bisa membagi dengan nol!")

        else:
            print("Operasi belum tersedia atau pilihan tidak valid.")
        
        print("\n")  # Membuat jarak antar operasi untuk tampilan yang lebih rapi

# Memanggil fungsi kalkulator untuk menjalankan program
kalkulator()
