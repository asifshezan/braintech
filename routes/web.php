<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RecycleController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Website\WebsiteController;

use App\Models\Admin;


// Website Routes Start
Route::get('/',[WebsiteController::class, 'index'])->name('website.home');
Route::get('about',[WebsiteController::class, 'about'])->name('website.about');
Route::get('services',[WebsiteController::class, 'service'])->name('website.services');
Route::get('our-team',[WebsiteController::class, 'team'])->name('website.our-team');
Route::get('case-studies',[WebsiteController::class, 'case'])->name('website.case-studies');
Route::get('blog',[WebsiteController::class, 'blog'])->name('website.blog');
Route::get('contact',[WebsiteController::class, 'contact'])->name('website.contact');
Route::post('newsletter',[WebsiteController::class, 'newsletter'])->name('website.newsletter');
Route::post('contact-message',[WebsiteController::class, 'contactmess']);

// Admin Panel Routes Start
Route::get('dashboard',[AdminController::class, 'index']);

// ALL USER ROUTE LIST
Route::get('dashboard/user',[UserController::class, 'index'])->name('user.index');
Route::get('dashboard/user/add',[UserController::class, 'add'])->name('user.create');
Route::get('dashboard/user/edit/{id}',[UserController::class, 'edit']);
Route::get('dashboard/user/view/{id}',[UserController::class, 'view']);
Route::post('dashboard/user/submit', [UserController::class, 'insert']);
Route::post('dashboard/user/update',[UserController::class, 'update']);
Route::post('dashboard/user/softdelete',[UserController::class, 'softdelete']);
Route::post('dashboard/user/restore',[UserController::class, 'restore']);
Route::post('dashboard/user/delete',[UserController::class, 'delete']);


Route::get('dashboard/banner',[BannerController::class, 'index']);
Route::get('dashboard/banner/add',[BannerController::class, 'add']);
Route::get('dashboard/banner/edit/{ban_id}',[BannerController::class, 'edit']);
Route::get('dashboard/banner/view/{ban_id}',[BannerController::class, 'view']);
Route::post('dashboard/banner/submit',[BannerController::class, 'insert']);
Route::post('dashboard/banner/update',[BannerController::class, 'update']);
Route::post('dashboard/banner/softdelete',[BannerController::class, 'softdelete']);



Route::get('dashboard/role',[RoleController::class, 'index']);
Route::get('dashboard/role/add',[RoleController::class, 'add']);
Route::get('dashboard/role/edit/{role_id}',[RoleController::class, 'edit']);
Route::get('dashboard/role/view/{role_id}',[RoleController::class, 'view']);
Route::post('dashboard/role/submit',[RoleController::class, 'insert']);
Route::post('dashboard/role/update',[RoleController::class, 'update']);
Route::post('dashboard/role/softdelete',[RoleController::class, 'softdelete']);
Route::post('dashboard/role/restore',[RoleController::class, 'restore']);
Route::post('dashboard/role/delete',[RoleController::class, 'delete']);


Route::get('dashboard/project',[ProjectController::class, 'index']);
Route::get('dashboard/project/add',[ProjectController::class, 'add']);
Route::get('dashboard/project/edit/{slug}',[ProjectController::class, 'edit']);
Route::get('dashboard/project/view/{slug}',[ProjectController::class, 'view']);
Route::post('dashboard/project/submit',[ProjectController::class, 'insert']);
Route::post('dashboard/project/update',[ProjectController::class, 'update']);
Route::post('dashboard/project/softdelete',[ProjectController::class, 'softdelete']);
Route::post('dashboard/project/restore',[ProjectController::class, 'restore']);
Route::post('dashboard/project/delete',[ProjectController::class, 'delete']);


Route::get('dashboard/project-category',[ProjectCategoryController::class, 'index']);
Route::get('dashboard/project-category/add',[ProjectCategoryController::class, 'add']);
Route::get('dashboard/project-category/edit/{slug}',[ProjectCategoryController::class, 'edit']);
Route::get('dashboard/project-category/view/{slug}',[ProjectCategoryController::class, 'view']);
Route::post('dashboard/project-category/submit',[ProjectCategoryController::class, 'insert']);
Route::post('dashboard/project-category/update',[ProjectCategoryController::class, 'update']);
Route::post('dashboard/project-category/softdelete',[ProjectCategoryController::class, 'softdelete']);
Route::post('dashboard/project-category/restore',[ProjectCategoryController::class, 'restore']);
Route::post('dashboard/project-category/delete',[ProjectCategoryController::class, 'delete']);



Route::get('dashboard/partner',[PartnerController::class, 'index']);
Route::get('dashboard/partner/add',[PartnerController::class, 'add']);
Route::get('dashboard/partner/edit/{slug}',[PartnerController::class, 'edit']);
Route::get('dashboard/partner/view/{slug}',[PartnerController::class, 'view']);
Route::post('dashboard/partner/submit',[PartnerController::class, 'insert']);
Route::post('dashboard/partner/update',[PartnerController::class, 'update']);
Route::post('dashboard/partner/softdelete',[PartnerController::class, 'softdelete']);
Route::post('dashboard/partner/restore',[PartnerController::class, 'restore']);
Route::post('dashboard/partner/delete',[PartnerController::class, 'delete']);


Route::get('dashboard/testimonial',[TestimonialController::class, 'index']);
Route::get('dashboard/testimonial/add',[TestimonialController::class, 'add']);
Route::get('dashboard/testimonial/edit/{test_id}',[TestimonialController::class, 'edit']);
Route::get('dashboard/testimonial/view/{test_id}',[TestimonialController::class, 'view']);
Route::post('dashboard/testimonial/submit',[TestimonialController::class, 'insert']);
Route::post('dashboard/testimonial/update',[TestimonialController::class, 'update']);
Route::post('dashboard/testimonial/softdelete',[TestimonialController::class, 'softdelete']);
Route::post('dashboard/testimonial/restore',[TestimonialController::class, 'restore']);
Route::post('dashboard/testimonial/delete',[TestimonialController::class, 'delete']);



Route::get('dashboard/client',[ClientController::class, 'index']);
Route::get('dashboard/client/add',[ClientController::class, 'add']);
Route::get('dashboard/client/edit/{client_id}',[ClientController::class, 'edit']);
Route::get('dashboard/client/view/{client_id}',[ClientController::class, 'view']);
Route::post('dashboard/client/submit',[ClientController::class, 'insert']);
Route::post('dashboard/client/update',[ClientController::class, 'update']);
Route::post('dashboard/client/softdelete',[ClientController::class, 'softdelete']);
Route::post('dashboard/client/restore',[ClientController::class, 'restore']);
Route::post('dashboard/client/delete',[ClientController::class, 'delete']);


Route::get('dashboard/service',[ServiceController::class, 'index']);
Route::get('dashboard/service/add',[ServiceController::class, 'add']);
Route::get('dashboard/service/edit/{service_id}',[ServiceController::class, 'edit']);
Route::get('dashboard/service/view/{service_id}',[ServiceController::class, 'view']);
Route::post('dashboard/service/submit',[ServiceController::class, 'insert']);
Route::post('dashboard/service/update',[ServiceController::class, 'update']);
Route::post('dashboard/service/softdelete',[ServiceController::class, 'softdelete']);
Route::post('dashboard/service/restore',[ServiceController::class, 'restore']);
Route::post('dashboard/service/delete',[ServiceController::class, 'delete']);


Route::get('dashboard/teammember',[TeamMemberController::class, 'index']);
Route::get('dashboard/teammember/add',[TeamMemberController::class, 'add']);
Route::get('dashboard/teammember/edit/{slug}',[TeamMemberController::class, 'edit'])->name('team-member.edit');
Route::get('dashboard/teammember/view/{slug}',[TeamMemberController::class, 'view']);
Route::post('dashboard/teammember/submit',[TeamMemberController::class, 'insert']);
Route::put('dashboard/teammember/{slug}',[TeamMemberController::class, 'update'])->name('team-member.update');
Route::post('dashboard/teammember/softdelete',[TeamMemberController::class, 'softdelete']);
Route::post('dashboard/teammember/restore',[TeamMemberController::class, 'restore']);
Route::post('dashboard/teammember/delete',[TeamMemberController::class, 'delete']);


Route::get('dashboard/gallery',[GalleryController::class, 'index']);
Route::get('dashboard/gallery/add',[GalleryController::class, 'add']);
Route::get('dashboard/gallery/edit/{slug}',[GalleryController::class, 'edit']);
Route::get('dashboard/gallery/view/{slug}',[GalleryController::class, 'view']);
Route::post('dashboard/gallery/submit',[GalleryController::class, 'insert']);
Route::post('dashboard/gallery/update',[GalleryController::class, 'update']);
Route::post('dashboard/gallery/softdelete',[GalleryController::class, 'softdelete']);
Route::post('dashboard/gallery/restore',[GalleryController::class, 'restore']);
Route::post('dashboard/gallery/delete',[GalleryController::class, 'delete']);


Route::get('dashboard/gallery-category',[GalleryCategoryController::class, 'index']);
Route::get('dashboard/gallery-category/add',[GalleryCategoryController::class, 'add']);
Route::get('dashboard/gallery-category/edit/{slug}',[GalleryCategoryController::class, 'edit']);
Route::get('dashboard/gallery-category/view/{slug}',[GalleryCategoryController::class, 'view']);
Route::post('dashboard/gallery-category/submit',[GalleryCategoryController::class, 'insert']);
Route::post('dashboard/gallery-category/update',[GalleryCategoryController::class, 'update']);
Route::post('dashboard/gallery-category/softdelete',[GalleryCategoryController::class, 'softdelete']);
Route::post('dashboard/gallery-category/restore',[GalleryCategoryController::class, 'restore']);
Route::post('dashboard/gallery-category/delete',[GalleryCategoryController::class, 'delete']);



Route::get('dashboard/basic',[ManageController::class, 'basic']);
Route::post('dashboard/basic/update',[ManageController::class, 'basic_update']);
Route::get('dashboard/socialmedia',[ManageController::class, 'socialmedia']);
Route::post('dashboard/socialmedia/update',[ManageController::class, 'social_update']);
Route::get('dashboard/contact',[ManageController::class, 'contact_info']);
Route::post('dashboard/contact/update',[ManageController::class, 'contact_update']);




Route::get('dashboard/contact-message',[ContactMessageController::class, 'index']);
Route::get('dashboard/contactmessage/view',[ContactMessageController::class, 'index']);
Route::get('dashboard/contactmessage/delete',[ContactMessageController::class, 'delete']);


Route::get('dashboard/newsletter',[NewsletterController::class, 'index']);
Route::post('dashboard/newsletter/submit',[NewsletterController::class, 'insert']);
Route::get('dashboard/newsletter/view',[NewsletterController::class, 'view']);
Route::get('dashboard/newsletter/delete',[NewsletterController::class, 'delete']);


// Content Controller
Route::get('dashboard/content',[ContentController::class, 'index']);
Route::get('dashboard/content/add',[ContentController::class, 'addd']);
Route::get('dashboard/content/edit',[ContentController::class, 'edit']);
Route::get('dashboard/content/view',[ContentController::class, 'view']);
Route::post('dashboard/content/submit',[ContentController::class, 'insert']);
Route::post('dashboard/content/update',[ContentController::class, 'update']);
Route::post('dashboard/content/softdelete',[ContentController::class, 'softdelete']);
Route::post('dashboard/content/restore',[ContentController::class, 'restore']);
Route::post('dashboard/content/delete',[ContentController::class, 'delete']);

// Page Controller
Route::get('dashboard/page',[PageController::class, 'index']);
Route::get('dashboard/page/add',[PageController::class, 'add']);
Route::get('dashboard/page/edit',[PageController::class, 'edit']);
Route::get('dashboard/page/view',[PageController::class, 'view']);
Route::post('dashboard/page/submit',[PageController::class, 'insert']);
Route::post('dashboard/page/update',[PageController::class, 'update']);
Route::post('dashboard/page/softdelete',[PageController::class, 'softdelete']);
Route::post('dashboard/page/restore',[PageController::class, 'restore']);
Route::post('dashboard/page/delete',[PageController::class, 'delete']);


// Banner Recycle
Route::get('dashboard/banner/recycle_banner',[RecycleController::class, 'recycle_banner']);
Route::get('dashboard/banner/restore/{slug}',[RecycleController::class, 'banner_restore']);
Route::post('dashboard/banner/delete',[RecycleController::class, 'banner_delete']);

// Service Recycle
Route::get('dashboard/service/recycle_service', [RecycleController::class, 'recycle_service']);
Route::get('dashboard/service/restore/{slug}', [RecycleController::class, 'service_restore']);
Route::post('dashboard/service/delete', [RecycleController::class, 'service_delete']);

// Project Recycle
Route::get('dashboard/recycle/project', [RecycleController::class, 'recycle_project']);
Route::get('dashboard/project/restore/{slug}', [RecycleController::class, 'project_restore']);
Route::post('dashboard/project/delete', [RecycleController::class, 'project_delete']);


// Testimonial Recycle
Route::get('dashboard/recycle/testimonials', [RecycleController::class, 'recycle_testimonial']);
Route::get('dashboard/testimonial/restore/{slug}', [RecycleController::class, 'test_restore']);
Route::post('dashboard/testimonial/delete', [RecycleController::class, 'test_delete']);

require __DIR__.'/auth.php';
