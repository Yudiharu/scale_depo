<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::redirect('/','home');

// Route::get('/test', function ()
// {
//     $cmd_str = "MODE COM3: BAUD=9600 PARITY=N DATA=8 STOP=1 XON=OFF TO=OFF OCTS=OFF ODSR=OFF IDSR=OFF RTS=OFF DTR=OFF";
//         $output = array();
//         exec($cmd_str, $output, $result);

//         $serial_port = fopen("COM3", "rb");
//         $hasil = fgets($serial_port, 2400);
//         echo $hasil;
//         fflush($serial_port);
//         fclose($serial_port);


// });


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@savechat')->name('home.savechat');

Route::middleware(['auth'])->prefix('admin')->group(function () {
	
     /**
     * Open serial
     */
    Route::get('openserial/test','OpenSerial@test')->name('openserial.test');

     /**
     * Customer
     */
    Route::get('customer/anydata', 'CustomerController@anyData')->name('customer.data');
    Route::post('customer/updateAjax', 'CustomerController@updateAjax')->name('customer.ajaxupdate');
    Route::post('customer/hapus_customer', 'CustomerController@hapus_customer')->name('customer.hapus_customer');
    Route::post('customer/edit_customer', 'CustomerController@edit_customer')->name('customer.edit_customer');
    Route::resource('customer', 'CustomerController');

      /**
     * Company
     */
    Route::get('company/anydata', 'CompanyController@anyData')->name('company.data');
    Route::post('company/updateAjax', 'CompanyController@updateAjax')->name('company.ajaxupdate');
    Route::post('company/hapus_company', 'CompanyController@hapus_company')->name('company.hapus_company');
    Route::post('company/edit_company', 'CompanyController@edit_company')->name('company.edit_company');
    Route::resource('company', 'CompanyController');

     /**
     * Supplier
     */
    Route::get('supplier/anydata', 'SupplierController@anyData')->name('supplier.data');
    Route::post('supplier/updateAjax', 'SupplierController@updateAjax')->name('supplier.ajaxupdate');
    Route::post('supplier/hapus_supplier', 'SupplierController@hapus_supplier')->name('supplier.hapus_supplier');
    Route::post('supplier/edit_supplier', 'SupplierController@edit_supplier')->name('supplier.edit_supplier');
    Route::resource('supplier', 'SupplierController');
    
     /**
     * Barang
     */
    Route::get('barangs/anydata', 'BarangsController@anyData')->name('barang.data');
    Route::post('barangs/updateAjax', 'BarangsController@updateAjax')->name('barangs.ajaxupdate');
    Route::post('barangs/hapus_barang', 'BarangsController@hapus_barang')->name('barangs.hapus_barang');
    Route::post('barangs/edit_barang', 'BarangsController@edit_barang')->name('barangs.edit_barang');
    Route::resource('barangs', 'BarangsController');

     /**
     * Size Type Master
     */
    Route::get('sizetipemaster/anydata', 'SizeTipeMasterController@anyData')->name('sizetipemaster.data');
    Route::post('sizetipemaster/updateAjax', 'SizeTipeMasterController@updateAjax')->name('sizetipemaster.ajaxupdate');
    Route::post('sizetipemaster/hapus_size', 'SizeTipeMasterController@hapus_size')->name('sizetipemaster.hapus_size');
    Route::post('sizetipemaster/edit_size', 'SizeTipeMasterController@edit_size')->name('sizetipemaster.edit_size');
    Route::resource('sizetipemaster', 'SizeTipeMasterController');

    /**
     * Transaksi
     */

    Route::get('transaksis/anydata','TransaksisController@anyData')->name('transaksi.data');
    Route::get('transaksis/formdata','TransaksisController@formData')->name('form.data');
    Route::post('transaksis/updateAjax', 'TransaksisController@updateAjax')->name('transaksis.ajaxupdate');
    Route::post('transaksis/hapus_transaksis', 'TransaksisController@hapus_transaksis')->name('transaksis.hapus_transaksis');
    Route::post('transaksis/edit_transaksis', 'TransaksisController@edit_transaksis')->name('transaksis.edit_transaksis');
    Route::get('transaksis/excel','TransaksisController@laporanExcel')->name('transaksis.laporanExcel');
    Route::get('transaksis/{transaksi}/export-pdf','TransaksisController@makePDF')->name('transaksis.pdf');
    Route::get('transaksis/laporanPDF','TransaksisController@laporanPDF')->name('transaksis.laporanPDF');
    Route::get('transaksis/laporanPeriode','TransaksisController@laporanPeriode')->name('transaksis.laporanPeriode');
    Route::post('transaksis/CetakLaporan','TransaksisController@CetakLaporan')->name('transaksis.cetakLaporan');
    Route::get('transaksis/formTransaksi','TransaksisController@formTransaksi')->name('transaksis.formTransaksi');
    Route::resource('transaksis', 'TransaksisController');
    
    // Route::get('transaksis/importexport','TransaksisController@importExport'); 
    // Route::post('transaksis/importransaksi','TransaksisController@importExcel'); 
   
     /**
     * User
     */
    Route::resource('users', 'UsersController');

    /*
     * Roles
     */
    Route::resource('roles', 'RolesController');

    /*
    * Permissions
    */
    Route::resource('permissions', 'PermissionsController');

});