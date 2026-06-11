<?php $__env->startSection('judul','Surat Warga'); ?>

<?php $__env->startSection('konten'); ?>
<div class="card p-4">
<h3>Daftar Pengajuan Surat Kelurahan</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">
<!-- BUTTON TAMBAH: Mengarah ke rute surat.create -->
        <a href="<?php echo e(route('surat.create')); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle-notch mr-1"></i> Tambah Pengajuan Surat
        </a>
    </div>

    <!-- FLASH SESSION: Menampilkan notifikasi sukses setelah redirect -->
    <?php if(session('sukses')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon fas fa-check-circle mr-2"></i> <?php echo e(session('sukses')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>



<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
        <th>No Surat</th>
        <th>Jenis Surat</th>
        <th>Nama Pemohon</th>
        <th>NIK Pemohon</th>
        <th>Tanggal Ajuan</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
<?php $__currentLoopData = $semuaSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($s->nomor_surat); ?></td>
    <td><?php echo e($s->jenis_surat); ?></td>
    <td><?php echo e($s->penduduk->nama); ?></td>
    <td><?php echo e($s->penduduk->nik); ?></td>
    <td><?php echo e($s->tanggal_ajuan); ?></td>
    <td>
        <div class="btn-group" role="group">
            <!-- Tombol Menuju Halaman Edit -->
            <a href="<?php echo e(route('surat.edit', $s->id)); ?>" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>

            <!-- Tombol Hapus Menggunakan Form POST dengan Method Spoofing DELETE -->
            <form action="<?php echo e(route('surat.destroy', $s->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data surat ini?')" class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </form>
        </div>
    </td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAB\Herd\kelurahan-main\resources\views/surat/index.blade.php ENDPATH**/ ?>