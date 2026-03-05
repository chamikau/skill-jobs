import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _733ecac7 = () => interopDefault(import('..\\pages\\admin\\approval.vue' /* webpackChunkName: "pages/admin/approval" */))
const _9f18d734 = () => interopDefault(import('..\\pages\\admin\\approval\\blocked-list.vue' /* webpackChunkName: "pages/admin/approval/blocked-list" */))
const _b0d345ca = () => interopDefault(import('..\\pages\\admin\\approval\\pending-list.vue' /* webpackChunkName: "pages/admin/approval/pending-list" */))
const _0bc2720c = () => interopDefault(import('..\\pages\\admin\\approval\\verified-list.vue' /* webpackChunkName: "pages/admin/approval/verified-list" */))
const _76635d9b = () => interopDefault(import('..\\pages\\admin\\companies\\index.vue' /* webpackChunkName: "pages/admin/companies/index" */))
const _73a93d0c = () => interopDefault(import('..\\pages\\admin\\confirm-password.vue' /* webpackChunkName: "pages/admin/confirm-password" */))
const _e3190eb4 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\index.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/index" */))
const _2f13aac4 = () => interopDefault(import('..\\pages\\admin\\courses\\index.vue' /* webpackChunkName: "pages/admin/courses/index" */))
const _2efe1540 = () => interopDefault(import('..\\pages\\admin\\dashboard.vue' /* webpackChunkName: "pages/admin/dashboard" */))
const _3b054688 = () => interopDefault(import('..\\pages\\admin\\document-list.vue' /* webpackChunkName: "pages/admin/document-list" */))
const _edeb2bbc = () => interopDefault(import('..\\pages\\admin\\document-list\\achievements\\index.vue' /* webpackChunkName: "pages/admin/document-list/achievements/index" */))
const _69cddc1b = () => interopDefault(import('..\\pages\\admin\\document-list\\educations\\index.vue' /* webpackChunkName: "pages/admin/document-list/educations/index" */))
const _46d51f86 = () => interopDefault(import('..\\pages\\admin\\document-list\\personal\\index.vue' /* webpackChunkName: "pages/admin/document-list/personal/index" */))
const _149a650c = () => interopDefault(import('..\\pages\\admin\\document-list\\projects\\index.vue' /* webpackChunkName: "pages/admin/document-list/projects/index" */))
const _5d60573e = () => interopDefault(import('..\\pages\\admin\\document-list\\references\\index.vue' /* webpackChunkName: "pages/admin/document-list/references/index" */))
const _577b99b0 = () => interopDefault(import('..\\pages\\admin\\document-list\\work-experience\\index.vue' /* webpackChunkName: "pages/admin/document-list/work-experience/index" */))
const _7156dc1f = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\index.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/index" */))
const _327d3776 = () => interopDefault(import('..\\pages\\admin\\events\\index.vue' /* webpackChunkName: "pages/admin/events/index" */))
const _552f07f0 = () => interopDefault(import('..\\pages\\admin\\feedbacks\\index.vue' /* webpackChunkName: "pages/admin/feedbacks/index" */))
const _135e801c = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\index.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/index" */))
const _1ca7e5e8 = () => interopDefault(import('..\\pages\\admin\\jobs\\index.vue' /* webpackChunkName: "pages/admin/jobs/index" */))
const _e51f7578 = () => interopDefault(import('..\\pages\\admin\\mentors\\index.vue' /* webpackChunkName: "pages/admin/mentors/index" */))
const _422b374b = () => interopDefault(import('..\\pages\\admin\\news\\index.vue' /* webpackChunkName: "pages/admin/news/index" */))
const _4e17fc26 = () => interopDefault(import('..\\pages\\admin\\old-organizations.vue' /* webpackChunkName: "pages/admin/old-organizations" */))
const _44d6d2b6 = () => interopDefault(import('..\\pages\\admin\\organizations\\index.vue' /* webpackChunkName: "pages/admin/organizations/index" */))
const _8988d256 = () => interopDefault(import('..\\pages\\admin\\profile.vue' /* webpackChunkName: "pages/admin/profile" */))
const _33a5049a = () => interopDefault(import('..\\pages\\admin\\profile\\2fa\\index.vue' /* webpackChunkName: "pages/admin/profile/2fa/index" */))
const _4a4b473a = () => interopDefault(import('..\\pages\\admin\\profile\\general.vue' /* webpackChunkName: "pages/admin/profile/general" */))
const _c63a0c26 = () => interopDefault(import('..\\pages\\admin\\profile\\invitations\\index.vue' /* webpackChunkName: "pages/admin/profile/invitations/index" */))
const _4c5cef30 = () => interopDefault(import('..\\pages\\admin\\profile\\password.vue' /* webpackChunkName: "pages/admin/profile/password" */))
const _f4839eb2 = () => interopDefault(import('..\\pages\\admin\\settings.vue' /* webpackChunkName: "pages/admin/settings" */))
const _31834e44 = () => interopDefault(import('..\\pages\\admin\\settings\\collections\\index.vue' /* webpackChunkName: "pages/admin/settings/collections/index" */))
const _138821ef = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\index.vue' /* webpackChunkName: "pages/admin/settings/consultations/index" */))
const _5ceff557 = () => interopDefault(import('..\\pages\\admin\\settings\\products\\index.vue' /* webpackChunkName: "pages/admin/settings/products/index" */))
const _5691135c = () => interopDefault(import('..\\pages\\admin\\settings\\roles\\index.vue' /* webpackChunkName: "pages/admin/settings/roles/index" */))
const _68c81002 = () => interopDefault(import('..\\pages\\admin\\settings\\tags\\index.vue' /* webpackChunkName: "pages/admin/settings/tags/index" */))
const _524b2731 = () => interopDefault(import('..\\pages\\admin\\settings\\users\\index.vue' /* webpackChunkName: "pages/admin/settings/users/index" */))
const _269ac4fa = () => interopDefault(import('..\\pages\\admin\\settings\\collections\\create.vue' /* webpackChunkName: "pages/admin/settings/collections/create" */))
const _f59f32a2 = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\create.vue' /* webpackChunkName: "pages/admin/settings/consultations/create" */))
const _68c30047 = () => interopDefault(import('..\\pages\\admin\\settings\\products\\create.vue' /* webpackChunkName: "pages/admin/settings/products/create" */))
const _b974ba3c = () => interopDefault(import('..\\pages\\admin\\settings\\roles\\create.vue' /* webpackChunkName: "pages/admin/settings/roles/create" */))
const _50238a08 = () => interopDefault(import('..\\pages\\admin\\settings\\tags\\create.vue' /* webpackChunkName: "pages/admin/settings/tags/create" */))
const _af30d56c = () => interopDefault(import('..\\pages\\admin\\settings\\users\\invitation.vue' /* webpackChunkName: "pages/admin/settings/users/invitation" */))
const _775811ac = () => interopDefault(import('..\\pages\\admin\\settings\\collections\\_id.vue' /* webpackChunkName: "pages/admin/settings/collections/_id" */))
const _6bd9eeea = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\_id\\index.vue' /* webpackChunkName: "pages/admin/settings/consultations/_id/index" */))
const _3dd9617f = () => interopDefault(import('..\\pages\\admin\\settings\\products\\_id.vue' /* webpackChunkName: "pages/admin/settings/products/_id" */))
const _72778678 = () => interopDefault(import('..\\pages\\admin\\settings\\roles\\_id.vue' /* webpackChunkName: "pages/admin/settings/roles/_id" */))
const _2fbe2aea = () => interopDefault(import('..\\pages\\admin\\settings\\tags\\_id.vue' /* webpackChunkName: "pages/admin/settings/tags/_id" */))
const _ffa97c4e = () => interopDefault(import('..\\pages\\admin\\settings\\users\\_id.vue' /* webpackChunkName: "pages/admin/settings/users/_id" */))
const _2b21e1ca = () => interopDefault(import('..\\pages\\admin\\settings\\consultations\\_id\\form.vue' /* webpackChunkName: "pages/admin/settings/consultations/_id/form" */))
const _65d1779c = () => interopDefault(import('..\\pages\\admin\\students.vue' /* webpackChunkName: "pages/admin/students" */))
const _cf175534 = () => interopDefault(import('..\\pages\\admin\\students\\index.vue' /* webpackChunkName: "pages/admin/students/index" */))
const _bc5cdcd2 = () => interopDefault(import('..\\pages\\admin\\students\\skills-and-hobbies\\index.vue' /* webpackChunkName: "pages/admin/students/skills-and-hobbies/index" */))
const _37431f93 = () => interopDefault(import('..\\pages\\admin\\students\\student-view.vue' /* webpackChunkName: "pages/admin/students/student-view" */))
const _2b3aeed2 = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\certifications\\index.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/certifications/index" */))
const _022c7540 = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\educations\\index.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/educations/index" */))
const _009b1dc1 = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\general.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/general" */))
const _32521b08 = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\hobbies-and-list.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/hobbies-and-list" */))
const _84b1f91e = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\projects\\index.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/projects/index" */))
const _7d30671e = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\certifications\\_id\\general.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/certifications/_id/general" */))
const _b5452e20 = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\educations\\_id\\general.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/educations/_id/general" */))
const _94be9cc2 = () => interopDefault(import('..\\pages\\admin\\students\\student-view\\_id\\projects\\_id\\general.vue' /* webpackChunkName: "pages/admin/students/student-view/_id/projects/_id/general" */))
const _29f283ee = () => interopDefault(import('..\\pages\\admin\\auth\\forgot-password.vue' /* webpackChunkName: "pages/admin/auth/forgot-password" */))
const _795fe06d = () => interopDefault(import('..\\pages\\admin\\auth\\login.vue' /* webpackChunkName: "pages/admin/auth/login" */))
const _0cfc7605 = () => interopDefault(import('..\\pages\\admin\\auth\\reset-password.vue' /* webpackChunkName: "pages/admin/auth/reset-password" */))
const _0213cb78 = () => interopDefault(import('..\\pages\\admin\\auth\\signup.vue' /* webpackChunkName: "pages/admin/auth/signup" */))
const _073cf5f2 = () => interopDefault(import('..\\pages\\admin\\auth\\two-factor-challenge.vue' /* webpackChunkName: "pages/admin/auth/two-factor-challenge" */))
const _22606640 = () => interopDefault(import('..\\pages\\admin\\auth\\two-factor-challenge-recovery.vue' /* webpackChunkName: "pages/admin/auth/two-factor-challenge-recovery" */))
const _03754048 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view" */))
const _6b0cc3f2 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\certifications\\index.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/certifications/index" */))
const _582506f5 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\educations\\index.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/educations/index" */))
const _fa914494 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\general.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/general" */))
const _2cd5feb3 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\hobbies-and-list.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/hobbies-and-list" */))
const _20927e66 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\projects\\index.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/projects/index" */))
const _4b7d2249 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\certifications\\_id\\general.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/certifications/_id/general" */))
const _2504719b = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\educations\\_id\\general.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/educations/_id/general" */))
const _03902dec = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\course-application-view\\_id\\projects\\_id\\general.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/course-application-view/_id/projects/_id/general" */))
const _2b5636d8 = () => interopDefault(import('..\\pages\\admin\\courses\\create-course.vue' /* webpackChunkName: "pages/admin/courses/create-course" */))
const _a8dfe080 = () => interopDefault(import('..\\pages\\admin\\courses\\create-course\\general.vue' /* webpackChunkName: "pages/admin/courses/create-course/general" */))
const _0c5dfb54 = () => interopDefault(import('..\\pages\\admin\\courses\\create-course\\_id\\contents\\index.vue' /* webpackChunkName: "pages/admin/courses/create-course/_id/contents/index" */))
const _02c6d34c = () => interopDefault(import('..\\pages\\admin\\courses\\create-course\\_id\\description.vue' /* webpackChunkName: "pages/admin/courses/create-course/_id/description" */))
const _68039328 = () => interopDefault(import('..\\pages\\admin\\courses\\create-course\\_id\\contents\\create.vue' /* webpackChunkName: "pages/admin/courses/create-course/_id/contents/create" */))
const _ff6bd1cc = () => interopDefault(import('..\\pages\\admin\\courses\\create-course\\_id\\contents\\_id\\general.vue' /* webpackChunkName: "pages/admin/courses/create-course/_id/contents/_id/general" */))
const _34de5bec = () => interopDefault(import('..\\pages\\admin\\courses\\edit-course.vue' /* webpackChunkName: "pages/admin/courses/edit-course" */))
const _9a64ede8 = () => interopDefault(import('..\\pages\\admin\\courses\\edit-course\\_id\\description.vue' /* webpackChunkName: "pages/admin/courses/edit-course/_id/description" */))
const _40b6a1d5 = () => interopDefault(import('..\\pages\\admin\\courses\\edit-course\\_id\\edit-contents\\index.vue' /* webpackChunkName: "pages/admin/courses/edit-course/_id/edit-contents/index" */))
const _7907b3f8 = () => interopDefault(import('..\\pages\\admin\\courses\\edit-course\\_id\\general.vue' /* webpackChunkName: "pages/admin/courses/edit-course/_id/general" */))
const _2e163adc = () => interopDefault(import('..\\pages\\admin\\courses\\edit-course\\_id\\student-applied-courses\\index.vue' /* webpackChunkName: "pages/admin/courses/edit-course/_id/student-applied-courses/index" */))
const _045c38ee = () => interopDefault(import('..\\pages\\admin\\courses\\edit-course\\_id\\edit-contents\\create.vue' /* webpackChunkName: "pages/admin/courses/edit-course/_id/edit-contents/create" */))
const _0158dabb = () => interopDefault(import('..\\pages\\admin\\courses\\edit-course\\_id\\edit-contents\\_id\\general.vue' /* webpackChunkName: "pages/admin/courses/edit-course/_id/edit-contents/_id/general" */))
const _765dea50 = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view" */))
const _e6da1ed2 = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\certifications\\index.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/certifications/index" */))
const _1f23bcf6 = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\educations\\index.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/educations/index" */))
const _13d52774 = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\general.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/general" */))
const _10b75223 = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\hobbies-and-list.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/hobbies-and-list" */))
const _7a80fcf6 = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\projects\\index.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/projects/index" */))
const _3a4ccdb9 = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\certifications\\_id\\general.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/certifications/_id/general" */))
const _b45955ea = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\educations\\_id\\general.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/educations/_id/general" */))
const _7f48e87a = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\event-application-view\\_id\\projects\\_id\\general.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/event-application-view/_id/projects/_id/general" */))
const _3d727b34 = () => interopDefault(import('..\\pages\\admin\\events\\create-event.vue' /* webpackChunkName: "pages/admin/events/create-event" */))
const _04c8a3f2 = () => interopDefault(import('..\\pages\\admin\\events\\create-event\\general.vue' /* webpackChunkName: "pages/admin/events/create-event/general" */))
const _9fbacb30 = () => interopDefault(import('..\\pages\\admin\\events\\create-event\\_id\\description.vue' /* webpackChunkName: "pages/admin/events/create-event/_id/description" */))
const _5e59f290 = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view" */))
const _0ff34712 = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\certifications\\index.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/certifications/index" */))
const _4f327d65 = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\educations\\index.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/educations/index" */))
const _2d812026 = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\general.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/general" */))
const _1c07fa43 = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\hobbies-and-list.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/hobbies-and-list" */))
const _a72a5e54 = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\projects\\index.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/projects/index" */))
const _cb7b744e = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\certifications\\_id\\general.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/certifications/_id/general" */))
const _5aec45aa = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\educations\\_id\\general.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/educations/_id/general" */))
const _fb7a0ecc = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\job-application-view\\_id\\projects\\_id\\general.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/job-application-view/_id/projects/_id/general" */))
const _d01a902a = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor" */))
const _086bb932 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\create.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/create" */))
const _242e8598 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\educations\\index.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/educations/index" */))
const _4b7da474 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\sessions\\index.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/sessions/index" */))
const _193d83d6 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\work-experiences\\index.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/work-experiences/index" */))
const _ed530fb4 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\educations\\create.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/educations/create" */))
const _d4ce5490 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\sessions\\create.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/sessions/create" */))
const _362741a8 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\work-experiences\\create.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/work-experiences/create" */))
const _6550c598 = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\educations\\_id\\general.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/educations/_id/general" */))
const _f231a4ac = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\sessions\\_id\\general.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/sessions/_id/general" */))
const _50de34cc = () => interopDefault(import('..\\pages\\admin\\mentors\\add-mentor\\_id\\work-experiences\\_id\\general.vue' /* webpackChunkName: "pages/admin/mentors/add-mentor/_id/work-experiences/_id/general" */))
const _6313f8d6 = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor" */))
const _47e67583 = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\educations\\index.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/educations/index" */))
const _7c2df478 = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\general.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/general" */))
const _af0bc71e = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\sessions\\index.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/sessions/index" */))
const _4f42d0fe = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\work-experiences\\index.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/work-experiences/index" */))
const _46c6f4ca = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\educations\\create.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/educations/create" */))
const _e3048726 = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\sessions\\create.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/sessions/create" */))
const _5b28a35d = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\work-experiences\\create.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/work-experiences/create" */))
const _eb5bb166 = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\educations\\_id\\general.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/educations/_id/general" */))
const _f6610ec2 = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\sessions\\_id\\general.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/sessions/_id/general" */))
const _1b0d6b8f = () => interopDefault(import('..\\pages\\admin\\mentors\\edit-mentor\\_id\\work-experiences\\_id\\general.vue' /* webpackChunkName: "pages/admin/mentors/edit-mentor/_id/work-experiences/_id/general" */))
const _2aeffcd3 = () => interopDefault(import('..\\pages\\admin\\news\\create.vue' /* webpackChunkName: "pages/admin/news/create" */))
const _5ef492cf = () => interopDefault(import('..\\pages\\admin\\news\\create-newstest.vue' /* webpackChunkName: "pages/admin/news/create-newstest" */))
const _9f615438 = () => interopDefault(import('..\\pages\\admin\\organizations\\invitations\\index.vue' /* webpackChunkName: "pages/admin/organizations/invitations/index" */))
const _61ac2bec = () => interopDefault(import('..\\pages\\admin\\student\\skills-and-hobbies\\index.vue' /* webpackChunkName: "pages/admin/student/skills-and-hobbies/index" */))
const _0522930a = () => interopDefault(import('..\\pages\\admin\\news\\create-news\\general.vue' /* webpackChunkName: "pages/admin/news/create-news/general" */))
const _25cd4b5d = () => interopDefault(import('..\\pages\\admin\\organizations\\company\\create.vue' /* webpackChunkName: "pages/admin/organizations/company/create" */))
const _2dd8d587 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))
const _24c7acb6 = () => interopDefault(import('..\\pages\\admin\\events\\edit-event\\_id.vue' /* webpackChunkName: "pages/admin/events/edit-event/_id" */))
const _505c43b6 = () => interopDefault(import('..\\pages\\admin\\events\\edit-event\\_id\\description.vue' /* webpackChunkName: "pages/admin/events/edit-event/_id/description" */))
const _29a253a2 = () => interopDefault(import('..\\pages\\admin\\events\\edit-event\\_id\\general.vue' /* webpackChunkName: "pages/admin/events/edit-event/_id/general" */))
const _928bfc98 = () => interopDefault(import('..\\pages\\admin\\news\\edit-news\\_id-test.vue' /* webpackChunkName: "pages/admin/news/edit-news/_id-test" */))
const _2ddade29 = () => interopDefault(import('..\\pages\\admin\\organizations\\company\\_id.vue' /* webpackChunkName: "pages/admin/organizations/company/_id" */))
const _11035c02 = () => interopDefault(import('..\\pages\\admin\\news\\create-news\\_id\\description.vue' /* webpackChunkName: "pages/admin/news/create-news/_id/description" */))
const _bff85f1e = () => interopDefault(import('..\\pages\\admin\\news\\edit-news\\_id\\description.vue' /* webpackChunkName: "pages/admin/news/edit-news/_id/description" */))
const _b9291446 = () => interopDefault(import('..\\pages\\admin\\news\\edit-news\\_id\\general.vue' /* webpackChunkName: "pages/admin/news/edit-news/_id/general" */))
const _8555fb64 = () => interopDefault(import('..\\pages\\admin\\events\\_create.vue' /* webpackChunkName: "pages/admin/events/_create" */))
const _191f6f19 = () => interopDefault(import('..\\pages\\admin\\events\\create.vue' /* webpackChunkName: "pages/admin/events/create" */))
const _4ddfc90a = () => interopDefault(import('..\\pages\\admin\\events\\_create\\general.vue' /* webpackChunkName: "pages/admin/events/_create/general" */))
const _3527b050 = () => interopDefault(import('..\\pages\\admin\\events\\_create\\_id\\description.vue' /* webpackChunkName: "pages/admin/events/_create/_id/description" */))
const _2e038163 = () => interopDefault(import('..\\pages\\admin\\student\\_id.vue' /* webpackChunkName: "pages/admin/student/_id" */))
const _1b17d55c = () => interopDefault(import('..\\pages\\admin\\student\\_id\\certifications.vue' /* webpackChunkName: "pages/admin/student/_id/certifications" */))
const _04ca44ae = () => interopDefault(import('..\\pages\\admin\\student\\_id\\educations.vue' /* webpackChunkName: "pages/admin/student/_id/educations" */))
const _3a167195 = () => interopDefault(import('..\\pages\\admin\\student\\_id\\general.vue' /* webpackChunkName: "pages/admin/student/_id/general" */))
const _e0945498 = () => interopDefault(import('..\\pages\\admin\\student\\_id\\hobbies-and-list.vue' /* webpackChunkName: "pages/admin/student/_id/hobbies-and-list" */))
const _283a52c6 = () => interopDefault(import('..\\pages\\admin\\student\\_id\\projects.vue' /* webpackChunkName: "pages/admin/student/_id/projects" */))
const _7478cbc6 = () => interopDefault(import('..\\pages\\admin\\companies\\_id\\application.vue' /* webpackChunkName: "pages/admin/companies/_id/application" */))
const _14c6ba32 = () => interopDefault(import('..\\pages\\admin\\course-applicant-lists\\_id\\application.vue' /* webpackChunkName: "pages/admin/course-applicant-lists/_id/application" */))
const _2822bdce = () => interopDefault(import('..\\pages\\admin\\event-applicant-lists\\_id\\application.vue' /* webpackChunkName: "pages/admin/event-applicant-lists/_id/application" */))
const _72937a4b = () => interopDefault(import('..\\pages\\admin\\events\\_id\\general.vue' /* webpackChunkName: "pages/admin/events/_id/general" */))
const _59a32590 = () => interopDefault(import('..\\pages\\admin\\feedbacks\\_id\\application.vue' /* webpackChunkName: "pages/admin/feedbacks/_id/application" */))
const _46638cfc = () => interopDefault(import('..\\pages\\admin\\job-applicant-lists\\_id\\application.vue' /* webpackChunkName: "pages/admin/job-applicant-lists/_id/application" */))
const _056e60a0 = () => interopDefault(import('..\\pages\\admin\\jobs\\_id\\application.vue' /* webpackChunkName: "pages/admin/jobs/_id/application" */))
const _264d5485 = () => interopDefault(import('..\\pages\\admin\\news\\_id\\general.vue' /* webpackChunkName: "pages/admin/news/_id/general" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/admin/approval",
    component: _733ecac7,
    name: "admin-approval",
    children: [{
      path: "blocked-list",
      component: _9f18d734,
      name: "admin-approval-blocked-list"
    }, {
      path: "pending-list",
      component: _b0d345ca,
      name: "admin-approval-pending-list"
    }, {
      path: "verified-list",
      component: _0bc2720c,
      name: "admin-approval-verified-list"
    }]
  }, {
    path: "/admin/companies",
    component: _76635d9b,
    name: "admin-companies"
  }, {
    path: "/admin/confirm-password",
    component: _73a93d0c,
    name: "admin-confirm-password"
  }, {
    path: "/admin/course-applicant-lists",
    component: _e3190eb4,
    name: "admin-course-applicant-lists"
  }, {
    path: "/admin/courses",
    component: _2f13aac4,
    name: "admin-courses"
  }, {
    path: "/admin/dashboard",
    component: _2efe1540,
    name: "admin-dashboard"
  }, {
    path: "/admin/document-list",
    component: _3b054688,
    name: "admin-document-list",
    children: [{
      path: "achievements",
      component: _edeb2bbc,
      name: "admin-document-list-achievements"
    }, {
      path: "educations",
      component: _69cddc1b,
      name: "admin-document-list-educations"
    }, {
      path: "personal",
      component: _46d51f86,
      name: "admin-document-list-personal"
    }, {
      path: "projects",
      component: _149a650c,
      name: "admin-document-list-projects"
    }, {
      path: "references",
      component: _5d60573e,
      name: "admin-document-list-references"
    }, {
      path: "work-experience",
      component: _577b99b0,
      name: "admin-document-list-work-experience"
    }]
  }, {
    path: "/admin/event-applicant-lists",
    component: _7156dc1f,
    name: "admin-event-applicant-lists"
  }, {
    path: "/admin/events",
    component: _327d3776,
    name: "admin-events"
  }, {
    path: "/admin/feedbacks",
    component: _552f07f0,
    name: "admin-feedbacks"
  }, {
    path: "/admin/job-applicant-lists",
    component: _135e801c,
    name: "admin-job-applicant-lists"
  }, {
    path: "/admin/jobs",
    component: _1ca7e5e8,
    name: "admin-jobs"
  }, {
    path: "/admin/mentors",
    component: _e51f7578,
    name: "admin-mentors"
  }, {
    path: "/admin/news",
    component: _422b374b,
    name: "admin-news"
  }, {
    path: "/admin/old-organizations",
    component: _4e17fc26,
    name: "admin-old-organizations"
  }, {
    path: "/admin/organizations",
    component: _44d6d2b6,
    name: "admin-organizations"
  }, {
    path: "/admin/profile",
    component: _8988d256,
    name: "admin-profile",
    children: [{
      path: "2fa",
      component: _33a5049a,
      name: "admin-profile-2fa"
    }, {
      path: "general",
      component: _4a4b473a,
      name: "admin-profile-general"
    }, {
      path: "invitations",
      component: _c63a0c26,
      name: "admin-profile-invitations"
    }, {
      path: "password",
      component: _4c5cef30,
      name: "admin-profile-password"
    }]
  }, {
    path: "/admin/settings",
    component: _f4839eb2,
    name: "admin-settings",
    children: [{
      path: "collections",
      component: _31834e44,
      name: "admin-settings-collections"
    }, {
      path: "consultations",
      component: _138821ef,
      name: "admin-settings-consultations"
    }, {
      path: "products",
      component: _5ceff557,
      name: "admin-settings-products"
    }, {
      path: "roles",
      component: _5691135c,
      name: "admin-settings-roles"
    }, {
      path: "tags",
      component: _68c81002,
      name: "admin-settings-tags"
    }, {
      path: "users",
      component: _524b2731,
      name: "admin-settings-users"
    }, {
      path: "collections/create",
      component: _269ac4fa,
      name: "admin-settings-collections-create"
    }, {
      path: "consultations/create",
      component: _f59f32a2,
      name: "admin-settings-consultations-create"
    }, {
      path: "products/create",
      component: _68c30047,
      name: "admin-settings-products-create"
    }, {
      path: "roles/create",
      component: _b974ba3c,
      name: "admin-settings-roles-create"
    }, {
      path: "tags/create",
      component: _50238a08,
      name: "admin-settings-tags-create"
    }, {
      path: "users/invitation",
      component: _af30d56c,
      name: "admin-settings-users-invitation"
    }, {
      path: "collections/:id",
      component: _775811ac,
      name: "admin-settings-collections-id"
    }, {
      path: "consultations/:id",
      component: _6bd9eeea,
      name: "admin-settings-consultations-id"
    }, {
      path: "products/:id",
      component: _3dd9617f,
      name: "admin-settings-products-id"
    }, {
      path: "roles/:id",
      component: _72778678,
      name: "admin-settings-roles-id"
    }, {
      path: "tags/:id",
      component: _2fbe2aea,
      name: "admin-settings-tags-id"
    }, {
      path: "users/:id",
      component: _ffa97c4e,
      name: "admin-settings-users-id"
    }, {
      path: "consultations/:id/form",
      component: _2b21e1ca,
      name: "admin-settings-consultations-id-form"
    }]
  }, {
    path: "/admin/students",
    component: _65d1779c,
    children: [{
      path: "",
      component: _cf175534,
      name: "admin-students"
    }, {
      path: "skills-and-hobbies",
      component: _bc5cdcd2,
      name: "admin-students-skills-and-hobbies"
    }, {
      path: "student-view",
      component: _37431f93,
      name: "admin-students-student-view",
      children: [{
        path: ":id?/certifications",
        component: _2b3aeed2,
        name: "admin-students-student-view-id-certifications"
      }, {
        path: ":id?/educations",
        component: _022c7540,
        name: "admin-students-student-view-id-educations"
      }, {
        path: ":id?/general",
        component: _009b1dc1,
        name: "admin-students-student-view-id-general"
      }, {
        path: ":id?/hobbies-and-list",
        component: _32521b08,
        name: "admin-students-student-view-id-hobbies-and-list"
      }, {
        path: ":id?/projects",
        component: _84b1f91e,
        name: "admin-students-student-view-id-projects"
      }, {
        path: ":id?/certifications/:id/general",
        component: _7d30671e,
        name: "admin-students-student-view-id-certifications-id-general"
      }, {
        path: ":id?/educations/:id/general",
        component: _b5452e20,
        name: "admin-students-student-view-id-educations-id-general"
      }, {
        path: ":id?/projects/:id/general",
        component: _94be9cc2,
        name: "admin-students-student-view-id-projects-id-general"
      }]
    }]
  }, {
    path: "/admin/auth/forgot-password",
    component: _29f283ee,
    name: "admin-auth-forgot-password"
  }, {
    path: "/admin/auth/login",
    component: _795fe06d,
    name: "admin-auth-login"
  }, {
    path: "/admin/auth/reset-password",
    component: _0cfc7605,
    name: "admin-auth-reset-password"
  }, {
    path: "/admin/auth/signup",
    component: _0213cb78,
    name: "admin-auth-signup"
  }, {
    path: "/admin/auth/two-factor-challenge",
    component: _073cf5f2,
    name: "admin-auth-two-factor-challenge"
  }, {
    path: "/admin/auth/two-factor-challenge-recovery",
    component: _22606640,
    name: "admin-auth-two-factor-challenge-recovery"
  }, {
    path: "/admin/course-applicant-lists/course-application-view",
    component: _03754048,
    name: "admin-course-applicant-lists-course-application-view",
    children: [{
      path: ":id?/certifications",
      component: _6b0cc3f2,
      name: "admin-course-applicant-lists-course-application-view-id-certifications"
    }, {
      path: ":id?/educations",
      component: _582506f5,
      name: "admin-course-applicant-lists-course-application-view-id-educations"
    }, {
      path: ":id?/general",
      component: _fa914494,
      name: "admin-course-applicant-lists-course-application-view-id-general"
    }, {
      path: ":id?/hobbies-and-list",
      component: _2cd5feb3,
      name: "admin-course-applicant-lists-course-application-view-id-hobbies-and-list"
    }, {
      path: ":id?/projects",
      component: _20927e66,
      name: "admin-course-applicant-lists-course-application-view-id-projects"
    }, {
      path: ":id?/certifications/:id/general",
      component: _4b7d2249,
      name: "admin-course-applicant-lists-course-application-view-id-certifications-id-general"
    }, {
      path: ":id?/educations/:id/general",
      component: _2504719b,
      name: "admin-course-applicant-lists-course-application-view-id-educations-id-general"
    }, {
      path: ":id?/projects/:id/general",
      component: _03902dec,
      name: "admin-course-applicant-lists-course-application-view-id-projects-id-general"
    }]
  }, {
    path: "/admin/courses/create-course",
    component: _2b5636d8,
    name: "admin-courses-create-course",
    children: [{
      path: "general",
      component: _a8dfe080,
      name: "admin-courses-create-course-general"
    }, {
      path: ":id?/contents",
      component: _0c5dfb54,
      name: "admin-courses-create-course-id-contents"
    }, {
      path: ":id?/description",
      component: _02c6d34c,
      name: "admin-courses-create-course-id-description"
    }, {
      path: ":id?/contents/create",
      component: _68039328,
      name: "admin-courses-create-course-id-contents-create"
    }, {
      path: ":id?/contents/:id/general",
      component: _ff6bd1cc,
      name: "admin-courses-create-course-id-contents-id-general"
    }]
  }, {
    path: "/admin/courses/edit-course",
    component: _34de5bec,
    name: "admin-courses-edit-course",
    children: [{
      path: ":id?/description",
      component: _9a64ede8,
      name: "admin-courses-edit-course-id-description"
    }, {
      path: ":id?/edit-contents",
      component: _40b6a1d5,
      name: "admin-courses-edit-course-id-edit-contents"
    }, {
      path: ":id?/general",
      component: _7907b3f8,
      name: "admin-courses-edit-course-id-general"
    }, {
      path: ":id?/student-applied-courses",
      component: _2e163adc,
      name: "admin-courses-edit-course-id-student-applied-courses"
    }, {
      path: ":id?/edit-contents/create",
      component: _045c38ee,
      name: "admin-courses-edit-course-id-edit-contents-create"
    }, {
      path: ":id?/edit-contents/:id?/general",
      component: _0158dabb,
      name: "admin-courses-edit-course-id-edit-contents-id-general"
    }]
  }, {
    path: "/admin/event-applicant-lists/event-application-view",
    component: _765dea50,
    name: "admin-event-applicant-lists-event-application-view",
    children: [{
      path: ":id?/certifications",
      component: _e6da1ed2,
      name: "admin-event-applicant-lists-event-application-view-id-certifications"
    }, {
      path: ":id?/educations",
      component: _1f23bcf6,
      name: "admin-event-applicant-lists-event-application-view-id-educations"
    }, {
      path: ":id?/general",
      component: _13d52774,
      name: "admin-event-applicant-lists-event-application-view-id-general"
    }, {
      path: ":id?/hobbies-and-list",
      component: _10b75223,
      name: "admin-event-applicant-lists-event-application-view-id-hobbies-and-list"
    }, {
      path: ":id?/projects",
      component: _7a80fcf6,
      name: "admin-event-applicant-lists-event-application-view-id-projects"
    }, {
      path: ":id?/certifications/:id/general",
      component: _3a4ccdb9,
      name: "admin-event-applicant-lists-event-application-view-id-certifications-id-general"
    }, {
      path: ":id?/educations/:id/general",
      component: _b45955ea,
      name: "admin-event-applicant-lists-event-application-view-id-educations-id-general"
    }, {
      path: ":id?/projects/:id/general",
      component: _7f48e87a,
      name: "admin-event-applicant-lists-event-application-view-id-projects-id-general"
    }]
  }, {
    path: "/admin/events/create-event",
    component: _3d727b34,
    name: "admin-events-create-event",
    children: [{
      path: "general",
      component: _04c8a3f2,
      name: "admin-events-create-event-general"
    }, {
      path: ":id?/description",
      component: _9fbacb30,
      name: "admin-events-create-event-id-description"
    }]
  }, {
    path: "/admin/job-applicant-lists/job-application-view",
    component: _5e59f290,
    name: "admin-job-applicant-lists-job-application-view",
    children: [{
      path: ":id?/certifications",
      component: _0ff34712,
      name: "admin-job-applicant-lists-job-application-view-id-certifications"
    }, {
      path: ":id?/educations",
      component: _4f327d65,
      name: "admin-job-applicant-lists-job-application-view-id-educations"
    }, {
      path: ":id?/general",
      component: _2d812026,
      name: "admin-job-applicant-lists-job-application-view-id-general"
    }, {
      path: ":id?/hobbies-and-list",
      component: _1c07fa43,
      name: "admin-job-applicant-lists-job-application-view-id-hobbies-and-list"
    }, {
      path: ":id?/projects",
      component: _a72a5e54,
      name: "admin-job-applicant-lists-job-application-view-id-projects"
    }, {
      path: ":id?/certifications/:id/general",
      component: _cb7b744e,
      name: "admin-job-applicant-lists-job-application-view-id-certifications-id-general"
    }, {
      path: ":id?/educations/:id/general",
      component: _5aec45aa,
      name: "admin-job-applicant-lists-job-application-view-id-educations-id-general"
    }, {
      path: ":id?/projects/:id/general",
      component: _fb7a0ecc,
      name: "admin-job-applicant-lists-job-application-view-id-projects-id-general"
    }]
  }, {
    path: "/admin/mentors/add-mentor",
    component: _d01a902a,
    name: "admin-mentors-add-mentor",
    children: [{
      path: "create",
      component: _086bb932,
      name: "admin-mentors-add-mentor-create"
    }, {
      path: ":id?/educations",
      component: _242e8598,
      name: "admin-mentors-add-mentor-id-educations"
    }, {
      path: ":id?/sessions",
      component: _4b7da474,
      name: "admin-mentors-add-mentor-id-sessions"
    }, {
      path: ":id?/work-experiences",
      component: _193d83d6,
      name: "admin-mentors-add-mentor-id-work-experiences"
    }, {
      path: ":id?/educations/create",
      component: _ed530fb4,
      name: "admin-mentors-add-mentor-id-educations-create"
    }, {
      path: ":id?/sessions/create",
      component: _d4ce5490,
      name: "admin-mentors-add-mentor-id-sessions-create"
    }, {
      path: ":id?/work-experiences/create",
      component: _362741a8,
      name: "admin-mentors-add-mentor-id-work-experiences-create"
    }, {
      path: ":id?/educations/:id/general",
      component: _6550c598,
      name: "admin-mentors-add-mentor-id-educations-id-general"
    }, {
      path: ":id?/sessions/:id/general",
      component: _f231a4ac,
      name: "admin-mentors-add-mentor-id-sessions-id-general"
    }, {
      path: ":id?/work-experiences/:id?/general",
      component: _50de34cc,
      name: "admin-mentors-add-mentor-id-work-experiences-id-general"
    }]
  }, {
    path: "/admin/mentors/edit-mentor",
    component: _6313f8d6,
    name: "admin-mentors-edit-mentor",
    children: [{
      path: ":id?/educations",
      component: _47e67583,
      name: "admin-mentors-edit-mentor-id-educations"
    }, {
      path: ":id?/general",
      component: _7c2df478,
      name: "admin-mentors-edit-mentor-id-general"
    }, {
      path: ":id?/sessions",
      component: _af0bc71e,
      name: "admin-mentors-edit-mentor-id-sessions"
    }, {
      path: ":id?/work-experiences",
      component: _4f42d0fe,
      name: "admin-mentors-edit-mentor-id-work-experiences"
    }, {
      path: ":id?/educations/create",
      component: _46c6f4ca,
      name: "admin-mentors-edit-mentor-id-educations-create"
    }, {
      path: ":id?/sessions/create",
      component: _e3048726,
      name: "admin-mentors-edit-mentor-id-sessions-create"
    }, {
      path: ":id?/work-experiences/create",
      component: _5b28a35d,
      name: "admin-mentors-edit-mentor-id-work-experiences-create"
    }, {
      path: ":id?/educations/:id/general",
      component: _eb5bb166,
      name: "admin-mentors-edit-mentor-id-educations-id-general"
    }, {
      path: ":id?/sessions/:id/general",
      component: _f6610ec2,
      name: "admin-mentors-edit-mentor-id-sessions-id-general"
    }, {
      path: ":id?/work-experiences/:id?/general",
      component: _1b0d6b8f,
      name: "admin-mentors-edit-mentor-id-work-experiences-id-general"
    }]
  }, {
    path: "/admin/news/create",
    component: _2aeffcd3,
    name: "admin-news-create"
  }, {
    path: "/admin/news/create-newstest",
    component: _5ef492cf,
    name: "admin-news-create-newstest"
  }, {
    path: "/admin/organizations/invitations",
    component: _9f615438,
    name: "admin-organizations-invitations"
  }, {
    path: "/admin/student/skills-and-hobbies",
    component: _61ac2bec,
    name: "admin-student-skills-and-hobbies"
  }, {
    path: "/admin/news/create-news/general",
    component: _0522930a,
    name: "admin-news-create-news-general"
  }, {
    path: "/admin/organizations/company/create",
    component: _25cd4b5d,
    name: "admin-organizations-company-create"
  }, {
    path: "/",
    component: _2dd8d587,
    name: "index"
  }, {
    path: "/admin/events/edit-event/:id?",
    component: _24c7acb6,
    name: "admin-events-edit-event-id",
    children: [{
      path: "description",
      component: _505c43b6,
      name: "admin-events-edit-event-id-description"
    }, {
      path: "general",
      component: _29a253a2,
      name: "admin-events-edit-event-id-general"
    }]
  }, {
    path: "/admin/news/edit-news/:id-test?",
    component: _928bfc98,
    name: "admin-news-edit-news-id-test"
  }, {
    path: "/admin/organizations/company/:id?",
    component: _2ddade29,
    name: "admin-organizations-company-id"
  }, {
    path: "/admin/news/create-news/:id?/description",
    component: _11035c02,
    name: "admin-news-create-news-id-description"
  }, {
    path: "/admin/news/edit-news/:id?/description",
    component: _bff85f1e,
    name: "admin-news-edit-news-id-description"
  }, {
    path: "/admin/news/edit-news/:id?/general",
    component: _b9291446,
    name: "admin-news-edit-news-id-general"
  }, {
    path: "/admin/events/:create",
    component: _8555fb64,
    children: [{
      path: "",
      component: _191f6f19,
      name: "admin-events-create"
    }, {
      path: "general",
      component: _4ddfc90a,
      name: "admin-events-create-general"
    }, {
      path: ":id/description",
      component: _3527b050,
      name: "admin-events-create-id-description"
    }]
  }, {
    path: "/admin/student/:id?",
    component: _2e038163,
    name: "admin-student-id",
    children: [{
      path: "certifications",
      component: _1b17d55c,
      name: "admin-student-id-certifications"
    }, {
      path: "educations",
      component: _04ca44ae,
      name: "admin-student-id-educations"
    }, {
      path: "general",
      component: _3a167195,
      name: "admin-student-id-general"
    }, {
      path: "hobbies-and-list",
      component: _e0945498,
      name: "admin-student-id-hobbies-and-list"
    }, {
      path: "projects",
      component: _283a52c6,
      name: "admin-student-id-projects"
    }]
  }, {
    path: "/admin/companies/:id/application",
    component: _7478cbc6,
    name: "admin-companies-id-application"
  }, {
    path: "/admin/course-applicant-lists/:id?/application",
    component: _14c6ba32,
    name: "admin-course-applicant-lists-id-application"
  }, {
    path: "/admin/event-applicant-lists/:id?/application",
    component: _2822bdce,
    name: "admin-event-applicant-lists-id-application"
  }, {
    path: "/admin/events/:id/general",
    component: _72937a4b,
    name: "admin-events-id-general"
  }, {
    path: "/admin/feedbacks/:id/application",
    component: _59a32590,
    name: "admin-feedbacks-id-application"
  }, {
    path: "/admin/job-applicant-lists/:id?/application",
    component: _46638cfc,
    name: "admin-job-applicant-lists-id-application"
  }, {
    path: "/admin/jobs/:id/application",
    component: _056e60a0,
    name: "admin-jobs-id-application"
  }, {
    path: "/admin/news/:id/general",
    component: _264d5485,
    name: "admin-news-id-general"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
