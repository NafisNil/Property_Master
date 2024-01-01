<?php

//nafis controller
use App\Http\Controllers\NewfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\WelcomeController;
//nafis controller
use App\Http\Controllers\Admin\AccountHolderController;
use App\Http\Controllers\Admin\JobOrderController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarMileageLogController;
use App\Http\Controllers\ChartAccountCategoryController;
use App\Http\Controllers\ChartAccountController;
use App\Http\Controllers\ChequeAndBankingLogController;
use App\Http\Controllers\ClassManagementMiscController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\FixedAssetController;
use App\Http\Controllers\FixedAssetTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidentReportController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\ItemRequestController;
use App\Http\Controllers\KeyLogController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\MailLogController;
use App\Http\Controllers\MaintenanceChecklistController;
use App\Http\Controllers\MarkAppealController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OurSchoolController;
use App\Http\Controllers\ParkerController;
use App\Http\Controllers\ParkerTypeController;
use App\Http\Controllers\ParkingLogController;
use App\Http\Controllers\ParkingLotController;
use App\Http\Controllers\ParkingRateController;
use App\Http\Controllers\ParkingStallAllocationController;
use App\Http\Controllers\ParkingStallController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\AnnoncmentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SpecialNeedsEducationController;
use App\Http\Controllers\Admin\MarksRecordsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReceivingLogController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ScheduleTypeController;
use App\Http\Controllers\SchoolRoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\SchoolInformationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Settings\TuitionInvoiceSettingController;
use App\Http\Controllers\ShippingLogController;
use App\Http\Controllers\StorageLockerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TaxTypeController;
use App\Http\Controllers\TimeSheetReportController;
use App\Http\Controllers\UserHubController;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\CleanAllController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\VisitorLogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\StdentsAssessmentsController;
use App\Http\Controllers\Admin\AdministrativeController;
use App\Http\Controllers\Admin\HumanResourcesController;
use App\Http\Controllers\Admin\RepairAndMaintenanceController;
use App\Http\Controllers\Admin\SalesAndMarketingController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ContractsController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\LegalAndCollectionsController;
use App\Http\Controllers\Admin\AccountingController;
use App\Http\Controllers\Admin\StudentsCompetationProgramController;
use App\Http\Controllers\Admin\StudentGraduationCeremoniesController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\MarketPlaceController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SystemUtilitiesController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\DiscussionBoardController;
use App\Http\Controllers\Admin\SchoolAboutController;
use App\Http\Controllers\Admin\SchoolServicesController;
use App\Http\Controllers\Admin\BoardOfDirectorsController;
use App\Http\Controllers\Admin\StaffDirectoryController;
use App\Http\Controllers\Admin\SchoolRulesPoliciesAndProceduresController;
use App\Http\Controllers\Admin\SchoolCodeOfConductController;
use App\Http\Controllers\Admin\SchoolRightsAndResponsibilitiesController;
use App\Http\Controllers\Admin\InformationSessionController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\RegStepController;
use App\Http\Controllers\Admin\FeesAndChargesController;
use App\Http\Controllers\Admin\RegistrationDeadlinesController;
use App\Http\Controllers\Admin\SchoolClosedDaysController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SchoolAnnouncementController;
use App\Http\Controllers\Admin\WorkshopController;
use App\Http\Controllers\Admin\DailyReportController;
use App\Http\Controllers\Admin\DateController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\EducationTeamController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\MemorandumController;
use App\Http\Controllers\Admin\SchoolMessageController;
use App\Http\Controllers\Admin\SchoolNoticeController;
use App\Http\Controllers\Admin\StudentRegistrationController;
use App\Http\Controllers\Admin\AssignedTaskController;
use App\Http\Controllers\Admin\ServiceProviderController;
use App\Http\Controllers\Admin\AssessmentController;
use Illuminate\Support\Facades\Storage;



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

//Route::get('/', [FrontEndController::class, 'index'])->name('frontEnd.index');
Route::get('clean-all', [CleanAllController::class, 'index'])->name('cleanAll.index');
//Route::get('data-found', [CleanAllController::class, 'index'])->name('cleanAll.index');

Route::get('/', [FrontEndController::class, 'index'])
    ->name('frontEnd.index');

Route::middleware(['auth', 'check_registration_complete', 'lang','logintime'])->group(function () {
  //nafis route
  Route::resource('newfile', NewfileController::class);
  Route::resource('company', CompanyController::class);
  Route::resource('welcome', WelcomeController::class);
  //nafis route
    Route::group(['namespace' => 'Admin', 'middleware' => 'prevent-back-history'], function () {
        Route::get('information', [InformationController::class, 'index'])->name('information.index');
        Route::get('annoncment', [AnnoncmentController::class, 'index'])->name('annoncment.index');
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('special-needs-education', [SpecialNeedsEducationController::class, 'index'])->name('specialNeedsEducation.index');
        Route::get('marks-records', [MarksRecordsController::class, 'index'])->name('marksRecords.index');
        Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('stdents-assessments', [StdentsAssessmentsController::class, 'index'])->name('stdentsAssessments.index');
        Route::get('administrative', [AdministrativeController::class, 'index'])->name('administrative.index');
        Route::get('human-resources', [HumanResourcesController::class, 'index'])->name('humanResources.index');
        Route::get('repair-and-maintenance', [RepairAndMaintenanceController::class, 'index'])->name('repairAndMaintenance.index');
        Route::get('sales-and-marketing', [SalesAndMarketingController::class, 'index'])->name('salesAndMarketing.index');
        Route::get('projects', [ProjectsController::class, 'index'])->name('projects.index');
        Route::get('contracts', [ContractsController::class, 'index'])->name('contracts.index');
        Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
        Route::get('legal-and-collections', [LegalAndCollectionsController::class, 'index'])->name('legalAndCollections.index');
        Route::get('accounting', [AccountingController::class, 'index'])->name('accounting.index');
        Route::get('students-competation-program', [StudentsCompetationProgramController::class, 'index'])->name('studentsCompetationProgram.index');
        Route::get('student-graduation-ceremonies', [StudentGraduationCeremoniesController::class, 'index'])->name('studentGraduationCeremonies.index');
        Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
        Route::get('market-place', [MarketPlaceController::class, 'index'])->name('marketPlace.index');
        Route::get('reports', [ReportsController::class, 'index'])->name('reports.index');
        Route::get('system-utilities', [SystemUtilitiesController::class, 'index'])->name('systemUtilities.index');
        Route::get('contacts', [ContactsController::class, 'index'])->name('contacts.index');

        Route::get('messages', [MessagesController::class, 'index'])->name('messages.index');
        Route::get('welcome-message-edit/{id}', [MessagesController::class, 'edit'])->name('messages.messageEdit');
        Route::post('welcome-message-update', [MessagesController::class, 'update'])->name('messages.messageUpdate');

        Route::get('school-about', [SchoolAboutController::class, 'index'])->name('SchoolAbout.index');
        Route::get('school-about-edit', [SchoolAboutController::class, 'edit'])->name('SchoolAbout.messageEdit');
        Route::post('school-about-update', [SchoolAboutController::class, 'update'])->name('SchoolAbout.messageUpdate');

        Route::get('school-services', [SchoolServicesController::class, 'index'])->name('SchoolServices.index');
        Route::get('school-services-edit/{id}', [SchoolServicesController::class, 'edit'])->name('SchoolServices.Edit');
        Route::post('school-services-update', [SchoolServicesController::class, 'update'])->name('SchoolServices.Update');

        Route::get('add-board-director', [BoardOfDirectorsController::class, 'create'])->name('boardDirector.create');
        Route::get('board-directors', [BoardOfDirectorsController::class, 'index'])->name('boardDirector.index');
        Route::post('board-director-store', [BoardOfDirectorsController::class, 'store'])->name('boardDirector.store');
        Route::get('board-director-edit/{id}/edit', [BoardOfDirectorsController::class, 'edit'])->name('boardDirector.edit');
        Route::post('board-director-update', [BoardOfDirectorsController::class, 'update'])->name('boardDirector.update');
        Route::get('board-director-delete/{id}/destroy', [BoardOfDirectorsController::class, 'destroy'])->name('boardDirector.destroy');
        Route::get('board-director-details/{id}', [BoardOfDirectorsController::class, 'details'])->name('boardDirector.details');

        Route::get('add-staff-directory', [StaffDirectoryController::class, 'create'])->name('staffDirectory.create');
        Route::get('staff-directory', [StaffDirectoryController::class, 'index'])->name('staffDirectory.index');
        Route::post('staff-directory-store', [StaffDirectoryController::class, 'store'])->name('staffDirectory.store');
        Route::get('staff-directory-edit/{id}/edit', [StaffDirectoryController::class, 'edit'])->name('staffDirectory.edit');
        Route::post('staff-directory-update', [StaffDirectoryController::class, 'update'])->name('staffDirectory.update');
        Route::get('staff-directory-delete/{id}/destroy', [StaffDirectoryController::class, 'destroy'])->name('staffDirectory.destroy');
        Route::get('staff-directory-details/{id}', [StaffDirectoryController::class, 'details'])->name('staffDirectory.details');

        Route::get('add-departments', [DepartmentController::class, 'create'])->name('Departments.create');
        Route::get('departments', [DepartmentController::class, 'index'])->name('Departments.index');
        Route::post('departments-store', [DepartmentController::class, 'store'])->name('Departments.store');
        Route::get('departments-edit/{id}/edit', [DepartmentController::class, 'edit'])->name('Departments.edit');
        Route::post('departments/{id}/update', [DepartmentController::class, 'update'])->name('Departments.update');
        Route::get('departments-delete/{id}/destroy', [DepartmentController::class, 'destroy'])->name('Departments.destroy');
        Route::get('departments-details/{id}', [DepartmentController::class, 'details'])->name('Departments.details');
        Route::get('/departments/{id}', [DepartmentController::class, 'show'])
            ->name('Departments.show');

        Route::get('school-rules-policies-and-procedures', [SchoolRulesPoliciesAndProceduresController::class, 'index'])->name('SchoolRulesPoliciesAndProcedures.index');
        Route::get('school-rules-policies-and-procedures-edit/{id}', [SchoolRulesPoliciesAndProceduresController::class, 'edit'])->name('SchoolRulesPoliciesAndProcedures.messageEdit');
        Route::post('school-rules-policies-and-procedures-update', [SchoolRulesPoliciesAndProceduresController::class, 'update'])->name('SchoolRulesPoliciesAndProcedures.Update');

        Route::get('school-code-of-conduct', [SchoolCodeOfConductController::class, 'index'])->name('SchoolCodeOfConduct.index');
        Route::get('school-code-of-conduct-edit/{id}', [SchoolCodeOfConductController::class, 'edit'])->name('SchoolCodeOfConduct.messageEdit');
        Route::post('school-code-of-conduct-update', [SchoolCodeOfConductController::class, 'update'])->name('SchoolCodeOfConduct.messageUpdate');

        Route::get('school-rights-and-responsibilities', [SchoolRightsAndResponsibilitiesController::class, 'index'])->name('SchoolRightsAndResponsibilities.index');
        Route::get('school-rights-and-responsibilities-edit/{id}', [SchoolRightsAndResponsibilitiesController::class, 'edit'])->name('SchoolRightsAndResponsibilities.messageEdit');
        Route::post('school-rights-and-responsibilities-update', [SchoolRightsAndResponsibilitiesController::class, 'update'])->name('SchoolRightsAndResponsibilities.messageUpdate');

        Route::get('add-information-session', [InformationSessionController::class, 'create'])->name('informationSession.create');
        Route::get('information-session', [InformationSessionController::class, 'index'])->name('informationSession.index');
        Route::post('information-session-store', [InformationSessionController::class, 'store'])->name('informationSession.store');
        Route::get('information-session-edit/{id}/edit', [InformationSessionController::class, 'edit'])->name('informationSession.edit');
        Route::post('information-session-update', [InformationSessionController::class, 'update'])->name('informationSession.update');
        Route::get('information-session-delete/{id}/destroy', [InformationSessionController::class, 'destroy'])->name('informationSession.destroy');
        Route::get('information-session-details/{id}', [InformationSessionController::class, 'details'])->name('informationSession.details');

        Route::get('add-deadlines', [RegistrationDeadlinesController::class, 'create'])->name('registrationDeadlines.create');
        Route::get('deadlines', [RegistrationDeadlinesController::class, 'index'])->name('registrationDeadlines.index');
        Route::post('deadlines-store', [RegistrationDeadlinesController::class, 'store'])->name('registrationDeadlines.store');
        Route::get('deadlines-edit/{id}/edit', [RegistrationDeadlinesController::class, 'edit'])->name('registrationDeadlines.edit');
        Route::post('deadlines-update', [RegistrationDeadlinesController::class, 'update'])->name('registrationDeadlines.update');
        Route::get('deadlines-delete/{id}/destroy', [RegistrationDeadlinesController::class, 'destroy'])->name('registrationDeadlines.destroy');

        Route::get('add-school-closed-days', [SchoolClosedDaysController::class, 'create'])->name('schoolClosedDays.create');
        Route::get('school-closed-days', [SchoolClosedDaysController::class, 'index'])->name('schoolClosedDays.index');
        Route::post('school-closed-days-store', [SchoolClosedDaysController::class, 'store'])->name('schoolClosedDays.store');
        Route::get('school-closed-days-edit/{id}/edit', [SchoolClosedDaysController::class, 'edit'])->name('schoolClosedDays.edit');
        Route::post('school-closed-days-update', [SchoolClosedDaysController::class, 'update'])->name('schoolClosedDays.update');
        Route::get('school-closed-days-delete/{id}/destroy', [SchoolClosedDaysController::class, 'destroy'])->name('schoolClosedDays.destroy');

        Route::get('content/{url}', [PagesController::class, 'index'])->name('pages.index');
        Route::get('content/{url}/add', [PagesController::class, 'create'])->name('pages.pagesAdd');
        Route::post('content/store', [PagesController::class, 'store'])->name('pages.pagesStore');
        Route::get('content/{id}/edit', [PagesController::class, 'edit'])->name('pages.pagesEdit');
        Route::post('content/update', [PagesController::class, 'update'])->name('pages.pagesUpdate');

        Route::get('add-school-profile', [SchoolProfileController::class, 'create'])->name('schoolProfile.create');
        Route::get('school-profile', [SchoolProfileController::class, 'index'])->name('schoolProfile.index');
        Route::post('school-profile-store', [SchoolProfileController::class, 'store'])->name('schoolProfile.store');
        Route::get('school-profile-edit/{id}/edit', [SchoolProfileController::class, 'edit'])->name('schoolProfile.edit');
        Route::post('school-profile-update', [SchoolProfileController::class, 'update'])->name('schoolProfile.update');

        Route::post('/school-profile/update-company', [SchoolProfileController::class, 'updateCompanyProfile'])
            ->name('school-profile.company-update');

        Route::get('school-profile-delete/{id}/destroy', [SchoolProfileController::class, 'destroy'])->name('schoolProfile.destroy');

        Route::get('discussion-board', [DiscussionBoardController::class, 'index'])->name('discussionBoard.index');
        Route::get('welcome-message', [MessagesController::class, 'welcome'])->name('welcomeMesssage.welcome');

        Route::get('add-school-announcment', [SchoolAnnouncementController::class, 'create'])->name('schoolAnnouncment.create');
        Route::get('school-announcment', [SchoolAnnouncementController::class, 'index'])->name('schoolAnnouncment.index');
        Route::post('school-announcment-store', [SchoolAnnouncementController::class, 'store'])->name('schoolAnnouncment.store');
        Route::get('school-announcment-edit/{id}/edit', [SchoolAnnouncementController::class, 'edit'])->name('schoolAnnouncment.edit');
        Route::post('school-announcment-update', [SchoolAnnouncementController::class, 'update'])->name('schoolAnnouncment.update');
        Route::get('school-announcment-delete/{id}/destroy', [SchoolAnnouncementController::class, 'destroy'])->name('schoolAnnouncment.destroy');
        Route::get('school-announcment-details/{id}', [SchoolAnnouncementController::class, 'details'])->name('schoolAnnouncment.details');


        //Class's

        Route::get('add-workshop', [WorkshopController::class, 'create'])->name('Workshop.create');
        Route::get('workshop', [WorkshopController::class, 'index'])->name('Workshop.index');
        Route::post('workshop-store', [WorkshopController::class, 'store'])->name('Workshop.store');
        Route::get('workshop-edit/{id}/edit', [WorkshopController::class, 'edit'])->name('Workshop.edit');
        Route::post('workshop-update', [WorkshopController::class, 'update'])->name('Workshop.update');
        Route::get('workshop-delete/{id}/destroy', [WorkshopController::class, 'destroy'])->name('Workshop.destroy');
        Route::get('workshop-details/{id}', [WorkshopController::class, 'details'])->name('Workshop.details');

        Route::get('add-daily_report', [DailyReportController::class, 'create'])->name('DailyReport.create');
        Route::get('daily_report', [DailyReportController::class, 'index'])->name('DailyReport.index');
        Route::post('daily_report-store', [DailyReportController::class, 'store'])->name('DailyReport.store');
        Route::get('daily_report-edit/{id}/edit', [DailyReportController::class, 'edit'])->name('DailyReport.edit');
        Route::post('daily_report/{id}/update', [DailyReportController::class, 'update'])->name('DailyReport.update');
        Route::get('daily_report-delete/{id}/destroy', [DailyReportController::class, 'destroy'])->name('DailyReport.destroy');
        Route::get('daily_report-details/{id}', [DailyReportController::class, 'details'])->name('DailyReport.details');

        Route::get('add-date', [DateController::class, 'create'])->name('Date.create');
        Route::get('date', [DateController::class, 'index'])->name('Date.index');
        Route::post('date-store', [DateController::class, 'store'])->name('Date.store');
        Route::get('date-edit/{id}/edit', [DateController::class, 'edit'])->name('Date.edit');
        Route::post('date-update', [DateController::class, 'update'])->name('Date.update');
        Route::get('date-delete/{id}/destroy', [DateController::class, 'destroy'])->name('Date.destroy');
        Route::get('date-details/{id}', [DateController::class, 'details'])->name('Date.details');

        Route::get('add-form', [FormController::class, 'create'])->name('Form.create');
        Route::get('form', [FormController::class, 'index'])->name('Form.index');
        Route::post('form-store', [FormController::class, 'store'])->name('Form.store');
        Route::get('form-edit/{id}/edit', [FormController::class, 'edit'])->name('Form.edit');
        Route::put('form-update/{id}', [FormController::class, 'update'])->name('Form.update');
        Route::get('form-delete/{id}/destroy', [FormController::class, 'destroy'])->name('Form.destroy');
        Route::get('form-details/{id}', [FormController::class, 'details'])->name('Form.details');
        Route::post('form-getuser', [FormController::class, 'getUsers'])->name('Form.getUser');

        Route::get('add-education-team', [EducationTeamController::class, 'create'])->name('EducationTeam.create');
        Route::get('education-team', [EducationTeamController::class, 'index'])->name('EducationTeam.index');
        Route::post('education-team-store', [EducationTeamController::class, 'store'])->name('EducationTeam.store');
        Route::get('education-team-edit/{id}/edit', [EducationTeamController::class, 'edit'])->name('EducationTeam.edit');
        Route::post('education-team-update', [EducationTeamController::class, 'update'])->name('EducationTeam.update');
        Route::get('education-team-delete/{id}/destroy', [EducationTeamController::class, 'destroy'])->name('EducationTeam.destroy');
        Route::get('education-team-details/{id}', [EducationTeamController::class, 'details'])->name('EducationTeam.details');
        Route::post('education-team-getuser', [EducationTeamController::class, 'getUsers'])->name('EducationTeam.getUser');

        Route::get('add-memorandum', [MemorandumController::class, 'create'])->name('Memorandum.create');
        Route::get('memorandum', [MemorandumController::class, 'index'])->name('Memorandum.index');
        Route::post('memorandum-store', [MemorandumController::class, 'store'])->name('Memorandum.store');
        Route::get('memorandum-edit/{id}/edit', [MemorandumController::class, 'edit'])->name('Memorandum.edit');
        Route::put('memorandum/{id}/update', [MemorandumController::class, 'update'])->name('Memorandum.update');
        Route::get('memorandum-delete/{id}/destroy', [MemorandumController::class, 'destroy'])->name('Memorandum.destroy');
        Route::get('memorandum-details/{id}', [MemorandumController::class, 'details'])->name('Memorandum.details');
        Route::post('memorandum-getuser', [MemorandumController::class, 'getUsers'])->name('Memorandum.getUser');
        //School Message
        Route::get('add-school-message', [SchoolMessageController::class, 'create'])->name('SchoolMessage.create');
        Route::get('school-message', [SchoolMessageController::class, 'index'])->name('SchoolMessage.index');
        Route::post('school-message-store', [SchoolMessageController::class, 'store'])->name('SchoolMessage.store');
        Route::get('school-message-edit/{id}/edit', [SchoolMessageController::class, 'edit'])->name('SchoolMessage.edit');
        Route::post('school-message/{id}/update', [SchoolMessageController::class, 'update'])->name('SchoolMessage.update');
        Route::get('/school-message/{id}', [SchoolMessageController::class, 'show'])->name('SchoolMessage.show');
        Route::get('school-message-delete/{id}/destroy', [SchoolMessageController::class, 'destroy'])->name('SchoolMessage.destroy');
        Route::get('school-message-details/{id}', [SchoolMessageController::class, 'details'])->name('SchoolMessage.details');
        Route::post('school-message-getuser', [SchoolMessageController::class, 'getUsers'])->name('SchoolMessage.getUser');


        Route::get('add-school-notice', [SchoolNoticeController::class, 'create'])->name('SchoolNotice.create');
        Route::get('school-notice', [SchoolNoticeController::class, 'index'])->name('SchoolNotice.index');
        Route::post('school-notice-store', [SchoolNoticeController::class, 'store'])->name('SchoolNotice.store');
        Route::get('school-notice-edit/{id}/edit', [SchoolNoticeController::class, 'edit'])->name('SchoolNotice.edit');
        Route::post('school-notice-update', [SchoolNoticeController::class, 'update'])->name('SchoolNotice.update');
        Route::get('school-notice-delete/{id}/destroy', [SchoolNoticeController::class, 'destroy'])->name('SchoolNotice.destroy');
        Route::get('school-notice-details/{id}', [SchoolNoticeController::class, 'details'])->name('SchoolNotice.details');
        Route::post('school-notice-getuser', [SchoolNoticeController::class, 'getUsers'])->name('SchoolNotice.getUser');

        Route::get('add-student-registration', [StudentRegistrationController::class, 'create'])->name('StudentRegistration.create');
        Route::get('student-registration', [StudentRegistrationController::class, 'index'])->name('StudentRegistration.index');
        Route::post('student-registration-store', [StudentRegistrationController::class, 'store'])->name('StudentRegistration.store');
        Route::get('student-registration-edit/{id}/edit', [StudentRegistrationController::class, 'edit'])->name('StudentRegistration.edit');
        Route::post('student-registration-update/{id}', [StudentRegistrationController::class, 'update'])->name('StudentRegistration.update');
        Route::get('student-registration-delete/{id}/destroy', [StudentRegistrationController::class, 'destroy'])->name('StudentRegistration.destroy');
        Route::get('student-registration-details/{id}', [StudentRegistrationController::class, 'details'])->name('StudentRegistration.details');
        Route::post('student-registration-getuser', [StudentRegistrationController::class, 'getUsers'])->name('StudentRegistration.getUser');

        Route::get('add-assigned-task', [AssignedTaskController::class, 'create'])->name('AssignedTask.create');
        Route::get('assigned-task', [AssignedTaskController::class, 'index'])->name('AssignedTask.index');
        Route::post('assigned-task-store', [AssignedTaskController::class, 'store'])->name('AssignedTask.store');
        Route::get('assigned-task-edit/{id}/edit', [AssignedTaskController::class, 'edit'])->name('AssignedTask.edit');
        Route::post('assigned-task-update', [AssignedTaskController::class, 'update'])->name('AssignedTask.update');
        Route::get('assigned-task-delete/{id}/destroy', [AssignedTaskController::class, 'destroy'])->name('AssignedTask.destroy');
        Route::get('assigned-task-details/{id}', [AssignedTaskController::class, 'details'])->name('AssignedTask.details');
        Route::post('assigned-task-getuser', [AssignedTaskController::class, 'getUsers'])->name('AssignedTask.getUser');

        Route::get('add-activity-log', [ActivityLogController::class, 'create'])->name('ActivityLog.create');
        Route::get('activity-log', [ActivityLogController::class, 'index'])->name('ActivityLog.index');
        Route::post('activity-log-store', [ActivityLogController::class, 'store'])->name('ActivityLog.store');
        Route::get('activity-log-edit/{id}/edit', [ActivityLogController::class, 'edit'])->name('ActivityLog.edit');
        Route::post('activity-log-update', [ActivityLogController::class, 'update'])->name('ActivityLog.update');
        Route::get('activity-log-delete/{id}/destroy', [ActivityLogController::class, 'destroy'])->name('ActivityLog.destroy');
        Route::get('activity-log-details/{id}', [ActivityLogController::class, 'details'])->name('ActivityLog.details');

        Route::post('/register/step-one', [RegStepController::class, 'saveStepOne'])
            ->name('reg.step-one');




      

        //Route::get('welcome-messages', [MessagesController::class, 'welcome'])->name('messages.welcome');
    });

    //
    Route::get('/welcome-message', [OurSchoolController::class, 'getWelcomeMessage'])
        ->name('our-school.get-welcome-message');

    Route::put('/welcome-message', [OurSchoolController::class, 'updateWelcomeMessage'])
        ->name('our-school.update-welcome-message');

    Route::resource('/fees-and-charges', FeesAndChargesController::class);

    Route::resource('/car-mileage-logs', CarMileageLogController::class);
    Route::resource('/visitor-logs', VisitorLogController::class);
    Route::resource('/key-logs', KeyLogController::class);
    Route::resource('/mail-logs', MailLogController::class);

    Route::resource('/cheque-banking-logs', ChequeAndBankingLogController::class);

    //Incident

    Route::resource('/incident-reports', IncidentReportController::class);
    Route::resource('/time-sheets', TimeSheetReportController::class);
    Route::resource('/projects', ProjectController::class);

    //Class Management Misc Routes

    Route::get('/calendar', [ClassManagementMiscController::class, 'calendar'])
        ->name('class-management.calendar');

    Route::get("/get-calendar-data", [ClassManagementMiscController::class, 'getCalendarData']);

    //End Class Management Misc Routes

    Route::resource('/assessments', AssessmentController::class);

    //Mark Appeal

    Route::get('/mark-appeals/{id}/resolve', [MarkAppealController::class, 'getResolve'])
        ->name('mark-appeals.create-resolve');

    Route::post('/mark-appeals/{id}/resolve', [MarkAppealController::class, 'postResolve'])
        ->name('mark-appeals.store-resolve');

    Route::resource('/mark-appeals', MarkAppealController::class);

    Route::resource('/service-providers', ServiceProviderController::class);
    Route::resource('/job-orders', JobOrderController::class);
    Route::resource('/inventory-items', InventoryItemController::class);
    Route::resource('/chart-account-categories', ChartAccountCategoryController::class);
    Route::resource('/chart-accounts', ChartAccountController::class);
    Route::resource('/fixed-asset-types', FixedAssetTypeController::class);
    Route::resource('/fixed-assets', FixedAssetController::class);
    Route::get('/get-child-categories', [ChartAccountCategoryController::class, 'getChildCategories']);
    Route::get('get-child-asset-types', [FixedAssetTypeController::class, 'getChildAssetTypes']);

    Route::resource('/students', StudentController::class);

//bank accounts

    Route::resource('/bank-accounts', BankAccountController::class);

    Route::resource('/fee-categories', FeeCategoryController::class);

    //tax

    Route::resource('/tax-types', TaxTypeController::class);
    Route::resource('/taxes', TaxController::class);

    Route::get('/get-tax', [TaxController::class, 'getTax']);

    Route::post('/seller-account/{id}/update', [AccountHolderController::class, 'updateSeller'])
        ->name('seller.update');

    Route::post('/service-provider-account/{id}update', [AccountHolderController::class, 'updateSeller'])
        ->name('service-provider.update');

    Route::post('/seller-account', [AccountHolderController::class, 'postSeller'])
        ->name('account-holder-seller.store');

    Route::post('/service-provider-account', [AccountHolderController::class, 'postSeller'])
        ->name('account-holder-service-provider.store');

    Route::get('/{type}_account/{id}/edit', [AccountHolderController::class, 'editTeacherEmployee'])
        ->name('teacher-employee-edit');

    //Route::get('/{type}/{', [AccountHolderController::class]);

    Route::resource('/account-holders', AccountHolderController::class);

    Route::get('/users/{id}/roles', [SchoolRoleController::class, 'getUserRoles']);

//for json

    Route::get("get-account-holders", [AccountHolderController::class, 'getAccountHolder']);

    Route::get('information/{type}', [SchoolInformationController::class, 'index'])
        ->name("information.index");

    Route::resource('/information', SchoolInformationController::class)
        ->except('index');

    Route::resource('/service-types', ServiceTypeController::class);

    Route::resource('/services', ServiceController::class);


    Route::get('get-child-room-types', [RoomTypeController::class, 'getChildRoomTypes']);

    Route::resource('/room-types', RoomTypeController::class);

    Route::get('/get-asset-row-for-room', [RoomController::class, 'getAssetRow']);

    Route::get('/transfer-fixed-assets', [RoomController::class, 'getTransfer'])
        ->name('get-transfer-fixed-asset');

    Route::post('/transfer-fixed-assets', [RoomController::class, 'postTransfer'])
        ->name('post-transfer-fixed-asset');

    Route::get('/get-room-assets', [RoomController::class, 'getRoomAssets']);

    Route::resource('/rooms', RoomController::class);

    //Storage Lockers
    Route::resource('/lockers', LockerController::class);

    Route::resource('/storage-lockers', StorageLockerController::class);

    //User's Hub

    Route::get('/students-hub', [UserHubController::class, 'studentHub'])
        ->name('students-hub');

    Route::get('/parent-hub', [UserHubController::class, 'parentHub'])
        ->name('parents-hub');

    Route::get('/parent-hub/{id}', [UserHubController::class, 'parentProfile'])
        ->name('parent-hub.show');

    Route::get('/seller-hub', [UserHubController::class, 'sellerHub']);
    Route::get('/service-provider-hub', [UserHubController::class, 'serviceProviderHub']);

    Route::get('/{type}-hub', [UserHubController::class, 'teacherAndEmployeeHub'])
        ->where('type', 'teacher|case-manager|resource-teacher|employee')
        ->name("user-hub.index");

    Route::get('/students-hub/{id}', [UserHubController::class, 'getStudentProfile']);

    Route::get('/admission-applicant/{id}', [StudentRegistrationController::class, 'reviewApplication'])
        ->name("admission-applicant.review");

    Route::post('/admission-applicant/{id}', [StudentRegistrationController::class, 'postReviewApplication'])
        ->name("admission-applicant.post-review");

    Route::get('/admission-and-registrations', [StudentRegistrationController::class, 'getAdmissions'])
        ->name('admission-and-registration');

    Route::post('/send-student-message/{id}', [MessagesController::class, 'postSendStudentMessage'])
        ->name("send-student-message.post");

    Route::get('/send-student-message/{id}', [MessagesController::class, 'getSendStudentMessage'])
        ->name("send-student-message");

    //Parking

    Route::resource('/parking-lots', ParkingLotController::class);

    Route::resource('/parking-stalls', ParkingStallController::class);

    Route::get('/get-unoccupied-stalls', [ParkingStallController::class, 'getUnoccupiedStalls']);

    Route::resource('/parker-types', ParkerTypeController::class);

    Route::resource('/parkers', ParkerController::class);

    Route::resource('/templates', App\Http\Controllers\TemplateBuilderController::class);

    Route::resource('/vehicle-types', VehicleTypeController::class);

    Route::resource('/vehicles', VehicleController::class);

    Route::resource('/parking-rates', ParkingRateController::class);

    Route::resource('/parking-stall-allocation', ParkingStallAllocationController::class);

    Route::get('/get-parkers', [ParkerController::class, 'getParkers']);

    //Booking and Schedules
    Route::resource('/bookings', BookingController::class);

    Route::resource('/schedule-types', ScheduleTypeController::class);

    Route::resource('/schedules', ScheduleController::class);

    Route::resource('/requests', ItemRequestController::class);

    //deposits
    Route::resource('/deposits', DepositController::class);

    //Route::get('/room-types');

    //Route::get('/send-student-message');

    /*    Route::get('/parent-hub/{id}', [UserHubController::class, 'parentProfile']);

        Route::get("/teacher-hub/{id}", [UserHubController::class, 'teacherProfile']);

        Route::get("/employee-hub/{id}", [UserHubController::class, 'teacherProfile']);*/

    Route::get("/{teacherType}-hub/{id}", [UserHubController::class, 'teacherProfile'])
        ->where('teacherType', 'teacher|case-manager|employee|resource-teacher');

    Route::get("/{type}-hub/{id}", [UserHubController::class, 'sellerProfile'])
        ->where('type', 'seller|service-provider');

//end academic years

//course outlines


    Route::post('/roles/{id}/update-permissions', [SchoolRoleController::class, 'update_permissions'])
        ->name('roles.update-permissions');

    Route::get('/update-user-roles', [SchoolRoleController::class, 'getUpdateUserRole'])
        ->name('update-user-roles.create');

    Route::post('/update-user-roles', [SchoolRoleController::class, 'postUpdateUserRole'])
        ->name('update-user-roles.update');

    Route::resource('/roles', SchoolRoleController::class);

    //Class schedules

    //notes
    Route::resource('/notes', NoteController::class);


    Route::resource('/shipping-logs', ShippingLogController::class);

    Route::resource('/receiving-logs', ReceivingLogController::class);

    Route::resource('/parking-logs', ParkingLogController::class);

    Route::resource('employee-attendance-logs', EmployeeAttendanceController::class);

    Route::resource('/maintenance-checklists', MaintenanceChecklistController::class);

    Route::get("/safety-devices-checklist", [RoomController::class, 'safetyDevices'])
        ->name('safety-devices');

    Route::get('/registration-status', [StudentRegistrationController::class, 'registrationStatus'])
        ->name('registration-status');

    //File

    Route::get('/files/{name?}', function ($fileName) {

        if (empty($fileName)) {
            return '';
        }

        $dbFile = \App\Models\Attachment::where(function ($query) use ($fileName) {
            return $query->where('id', $fileName)
                ->orWhere('file_name', $fileName);
        })->firstOrFail();

        $file = Storage::disk($dbFile->disk)
            ->get($dbFile->file_path);


        $response = response()->make($file, 200);
        $response->header("Content-Type", $dbFile->mime_type);
        return $response;
    })->name('open-file');

    //language

    Route::post('/change-language', [HomeController::class, 'changeLanguage']);

    //settings

    Route::resource('/tuition-invoice-settings', TuitionInvoiceSettingController::class);

    Route::post("/generate-tuition-invoice", [TuitionInvoiceSettingController::class, 'generateInvoice'])
        ->name("generate-tuition-invoice");

    Route::get('/time-and-date-format', [SettingController::class, 'getTimeAndDateFormat'])
        ->name("time-and-date-format.index");

    Route::post('/time-and-date-format', [SettingController::class, 'postTimeAndDateFormat'])
        ->name("time-and-date-format.store");
});

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes(['authenticate' => false]);
    Route::prefix('authenticate')->group(function () {
        Route::get('/dashboard', [AuthenticateController::class, 'dashboard'])->name('dashboard')
            ->middleware(['auth', 'check_registration_complete', 'lang']);
        Route::get('/login', [AuthenticateController::class, 'login'])->name('authenticate.login');
        Route::get('create-account', [AuthenticateController::class, 'createAccount'])->name('authenticate.createAccount');

        //Route::get('create-school-account', [AuthenticateController::class, 'createSchoolAccount'])
        //->name('authenticate.createSchoolAccount');

        Route::get('/create-school-account', [RegStepController::class, 'create'])
            ->name('authenticate.createSchoolAccount');

        Route::post('/register/step-one', [RegStepController::class, 'saveStepOne'])
            ->name('reg.step-one');

        Route::post('/register/step-two', [RegStepController::class, 'saveStepTwo'])
            ->name('reg.step-two');

        Route::post('/register/step-three', [RegStepController::class, 'saveStepThree'])
            ->name('reg.step-three');

        Route::post('/register/save-payment', [RegStepController::class, 'savePayment'])
            ->name('reg.save-payment');

        Route::post('/register/step-four', [RegStepController::class, 'saveStepFour'])
            ->name('reg.step-four')
            ->middleware('set-value:5');

        Route::post('/register/step-five', [RegStepController::class, 'saveStepFive'])
            ->name('reg.step-five');

        Route::post('/register/step-six', [RegStepController::class, 'saveStepSix'])
            ->name('reg.step-six');

        Route::post('/register/step-seven', [RegStepController::class, 'saveStepSeven'])
            ->name('reg.step-seven');

        Route::post('/register/step-eight', [RegStepController::class, 'saveStepEight'])
            ->name('reg.step-eight');

        Route::post('/register/step-nine', [RegStepController::class, 'saveStepNine'])
            ->name('reg.step-nine');

        Route::post('/register/step-ten', [RegStepController::class, 'saveStepTen'])
            ->name('reg.step-ten');

        Route::post('/register/step-eleven', [RegStepController::class, 'saveStepEleven'])
            ->name('reg.step-eleven');

        Route::post('/register/step-twelve', [RegStepController::class, 'saveStepTwelve'])
            ->name('reg.step-twelve');

        Route::post('/create-school-store', [AuthenticateController::class, 'createSchoolStore'])->name('authenticate.createSchoolStore');

        Route::post('/make_login', [AuthenticateController::class, 'make_login'])->name('authenticate.make_login');

        Route::get('/register', [AuthenticateController::class, 'register'])->name('authenticate.register');

        Route::post('/make_register', [AuthenticateController::class, 'make_register'])->name('authenticate.make_register');

        Route::post('/logout', [AuthenticateController::class, 'logout'])->name('authenticate.logout');
        Route::get('/pass_change', [AuthenticateController::class, 'pass_change'])->name('authenticate.pass_change');
        Route::post('/pass_change_submit', [AuthenticateController::class, 'pass_change_submit'])->name('authenticate.pass_change_submit');
    });

    //Route::get('reg-steps', [RegStepController::class, 'index'])->name('regStep.index');
    Route::resource('samples', SampleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('usermanager', UserManagerController::class);

});
