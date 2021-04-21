USE db_kammpus;

CREATE TABLE tbl_jurusan(
    id_jurusan VARCHAR (60) PRIMARY KEY ,
    jurusan TEXT
);

INSERT INTO tbl_jurusan
(id_jurusan, jurusan)
VALUES
('RPL','Rekayasa Perangkat lunak'),
('TKJ', 'Teknik Komputer Jaringan');

CREATE TABLE tbl_datasiswa(
    id_datasiswa INT (11) PRIMARY KEY  ,
    id_kelas VARCHAR (60)  ,
    nis VARCHAR (60)  ,
    id_jurusan VARCHAR (60)  ,
    tgl_tambah TIMESTAMP 
);
INSERT INTO tbl_datasiswa
(id_kelas, nis, id_jurusan)
VALUES
('X2019', '100050100', 'RPL'),
('X2019', '10005012361', 'RPL'),
('X2019', '100050305', 'TKJ'),
('X2019', '100050457', 'TKJ'),
('X2019', '100050648', 'MM'),
('X2020', '100051570', 'RPL'),
('X2020', '100051672', 'RPL'),
('X2020', '1000516763', 'TKJ'),
('X2020', '100051784', 'TKJ'),
('X2020', '100052304', 'MM'),
('X2021', '100052334', 'RPL'),
('X2021', '10005234', 'RPL'),
('X2021', '100053415', 'TKJ'),
('X2021', '1000535606', 'TKJ'),
('X2021', '10005678911', 'MM');


ALTER TABLE tbl_datasiswa
ADD CONSTRAINT fk_idkelas
FOREIGN KEY (id_kelas) REFERENCES tbl_kelas (id_kelas);
ALTER TABLE tbl_datasiswa
ADD CONSTRAINT fk_nis
FOREIGN KEY (nis) REFERENCES tbl_siswa (nis);
ALTER TABLE tbl_datasiswa
ADD CONSTRAINT fk_idjurusan
FOREIGN KEY (id_jurusan) REFERENCES tbl_jurusan (id_jurusan);

INSERT INTO tbl_datasiswa
(id_kelas, nis, )
DROP TABLE tbl_kelas;

CREATE TABLE tbl_siswa(
    nis VARCHAR (60) PRIMARY KEY ,
    nama_siswa TEXT,
    jenis_kelamin TEXT ,
    alamat TEXT ,
    no_telp TEXT,
    email TEXT ,
    tgl_terdaftar TIMESTAMP  
);
INSERT INTO tbl_siswa
(nis, nama_siswa, jenis_kelamin, alamat, no_telp, email)
VALUES
('147577', 'Putra Rafii', 'laki-laki', 'Cikarang-Bekasi', '0810xxxxxxx', 'rafiiputra@gmail.com'),
('177674', 'Ahmad Afriansyah', 'laki-laki', 'Cibarusah-Bekasi', '0811xxxxxxx', 'afriansyahahmd@gmail.com'),
('10005234', 'Lukman', 'laki-laki', 'Cikarang-Bekasi', '0812xxxxxxx', 'lkmn13@gmail.com'),
('100052304', 'Oktaviana', 'laki-laki', 'Cikarang-Bekasi', '0813xxxxxxx', 'oktavaina10@gmail.com'),
('100050305', 'Hasna', 'Perempuan', 'Cikarang-Bekasi', '0814xxxxxxx', 'hasnaa@gmail.com'),
('10005012361', 'Putria', 'laki-laki', 'Cikarang-Bekasi', '0815xxxxxxx', 'putriaa@gmail.com'),
('1000535606', 'Hidayat', 'laki-laki', 'Cikarang-Bekasi', '0816xxxxxxx', 'hdyat@gmail.com'),
('100050457', 'Marshanda', 'Perempuan', 'Cikarang-Bekasi', '0817xxxxxxx', 'mrshandaa@gmail.com'),
('100050648', 'nasmay', 'Perempuan', 'Cikarang-Bekasi', '0818xxxxxxx', 'nasmayy15@gmail.com'),
('100057609', 'Nabilla', 'Perempuan', 'Cikarang-Bekasi', '0819xxxxxxx', 'nblaa@gmail.com'),
('100051570', 'Osama', 'laki-laki', 'Cikarang-Bekasi', '0820xxxxxxx', 'Osama29@gmail.com'),
('10005678911', 'hanami', 'Perempuan', 'Cikarang-Bekasi', '0821xxxxxxx', 'hanami-chan@gmail.com'),
('100051672', 'Geewonii', 'Perempuan', 'Cikarang-Bekasi', '0822xxxxxxx', 'Gwonee12@gmail.com'),
('1000516763', 'Aldiansyah', 'laki-laki', 'Cikarang-Bekasi', '0823xxxxxxx', 'aldii01@gmail.com'),
('100051784', 'Tomozaki', 'laki-laki', 'Cikarang-Bekasi', '0824xxxxxxx', 'tomookun@gmail.com'),
('100053415', 'Tohka', 'Perempuan', 'Cikarang-Bekasi', '0825xxxxxxx', 'tohkaa-san@gmail.com');

CREATE TABLE tbl_kelas(
    id_kelas VARCHAR (60) PRIMARY KEY ,
    kelas TEXT ,
    id_guru VARCHAR (60)
);
INSERT INTO tbl_kelas
(id_kelas, kelas, id_guru)
VALUES
('X2021', 'Kelas X Angkatan 2021/2022', 'DG-0001'),
('X2020', 'Kelas XI Angkatan 2020/2021', 'DG-0002'),
('X2019', 'Kelas XII Angkatan 2019/2020', 'DG-0002');

CREATE TABLE tbl_guru (
    id_guru VARCHAR (60) PRIMARY KEY ,
    nama_guru TEXT ,
    nip TEXT 
);
ALTER TABLE tbl_kelas
ADD CONSTRAINT fk_idguru
FOREIGN KEY (id_guru) REFERENCES tbl_guru (id_guru);
INSERT INTO tbl_guru 
(id_guru, nama_guru, nip)
VALUES
('DG-0001', 'Mashiro Shiina S.Kom', '1000510'),
('DG-0002', 'Rin Tohsaka S.Kom', '1000511'),
('DG-0003', 'Nezuko Miyako', '1000512');
DROP TABLE tbl_guru