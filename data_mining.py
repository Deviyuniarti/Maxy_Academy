import random
import numpy as np
import statistics
import matplotlib.pyplot as plt

# Membuat array berisi 50 angka random antara 0-100
array1 = [random.randint(0, 100) for _ in range(50)]

# Menghitung mean, median & standard deviasi dari data tersebut
mean = statistics.mean(array1)
median = statistics.median(array1)
std_dev = np.std(array1)

print (f" Mean: {mean}, Median: {median}, Standard Deviasi: {std_dev}")

# Menampilkan angka yg lebih tinggi dari rata rata
angka_di_atas_mean = [x for x in array1 if x > mean]
print("Angka di atas rata-rata:", angka_di_atas_mean)

# Membuat array baru yg mengandung semua angka genap dari array pertama
array_genap = [x for x in array1 if x % 2 == 0]
print("Array genap:", array_genap)

# Mencari angka minimum & maksimum dari array kedua
if array_genap:
    min_genap = min(array_genap)
    max_genap = max(array_genap)
    print(f"Min: {min_genap}, Max: {max_genap}")
else:
    print("Tidak ada angka genap.")

# Mengubah array pertama menjadi 5x10 matrix
array1_matrix = np.reshape(array1, (5, 10))
print("Matrix 5x10:", array1_matrix)

# Transpose matrix dan menghitung jumlah setiap baris
transpose_matrix = np.transpose(array1_matrix)
jumlah_per_baris = np. sum(transpose_matrix, axis=1)

print("Tranpose Matrix:", transpose_matrix)
print("jumlah_per_baris:", jumlah_per_baris)

# Membuat histogram dari array pertama
plt.hist(array1, bins=10, edgecolor="black")
plt.title("Histrogram Array Pertama")
plt.xlabel("Nilai")
plt.ylabel("Frekuensi")
plt.show()








