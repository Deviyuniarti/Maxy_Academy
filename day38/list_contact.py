# Daftar kontak sebagai list
contacts = []

# Fungsi untuk menampilkan semua kontak
def display_contacts():
    if not contacts:
        print("Tidak ada kontak yang tersedia.")
    else:
        print("\nDaftar Kontak:")
        for contact in contacts:
            print(f"ID: {contact['id']}, Nama: {contact['name']}, Nomor Telepon: {contact['phone']}")

# Fungsi untuk menambahkan kontak
def add_contact(name, phone):
    contact_id = len(contacts) + 1  # Menggunakan panjang list sebagai ID
    contacts.append({'id': contact_id, 'name': name, 'phone': phone})
    print(f"Kontak '{name}' berhasil ditambahkan.")

# Fungsi untuk mengubah kontak
def update_contact(contact_id, new_name, new_phone):
    for contact in contacts:
        if contact['id'] == contact_id:
            contact['name'] = new_name
            contact['phone'] = new_phone
            print(f"Kontak ID {contact_id} berhasil diubah.")
            return
    print(f"Kontak ID {contact_id} tidak ditemukan.")

# Fungsi untuk menghapus kontak
def delete_contact(contact_id):
    global contacts
    contacts = [contact for contact in contacts if contact['id'] != contact_id]
    print(f"Kontak ID {contact_id} berhasil dihapus.")

# Menu utama aplikasi
def main():
    while True:
        print("\n=== Aplikasi Contact List ===")
        print("1. Tampilkan Kontak")
        print("2. Tambah Kontak")
        print("3. Ubah Kontak")
        print("4. Hapus Kontak")
        print("5. Keluar")
        
        choice = input("Pilih menu (1-5): ")
        
        if choice == '1':
            display_contacts()
        elif choice == '2':
            name = input("Masukkan nama kontak: ")
            phone = input("Masukkan nomor telepon: ")
            add_contact(name, phone)
        elif choice == '3':
            contact_id = int(input("Masukkan ID kontak yang ingin diubah: "))
            new_name = input("Masukkan nama baru: ")
            new_phone = input("Masukkan nomor telepon baru: ")
            update_contact(contact_id, new_name, new_phone)
        elif choice == '4':
            contact_id = int(input("Masukkan ID kontak yang ingin dihapus: "))
            delete_contact(contact_id)
        elif choice == '5':
            print("Keluar dari aplikasi.")
            break
        else:
            print("Pilihan tidak valid. Silakan coba lagi.")

# Menjalankan aplikasi
if __name__ == "__main__":
    main()
