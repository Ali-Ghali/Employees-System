<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
    'الموظفين',
    'قائمة الموظفين',
    'التقارير',
    'تقرير الموظفين',
    'المستخدمين',
    'قائمة المستخدمين',
    'صلاحيات المستخدمين',



    'اضافة موظف',
    'حذف موظف',
    'تصدير EXCEL',
    'تعديل بيانات موظف',
    'طباعة بيانات موظف',
    'اضافة مرفق',
    'حذف المرفق',

    'اضافة مستخدم',
    'تعديل مستخدم',
    'حذف مستخدم',

    'عرض صلاحية',
    'اضافة صلاحية',
    'تعديل صلاحية',
    'حذف صلاحية',

    'الاشعارات',

];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}