export const patient_app_url = 'https://patient-primed-ehr.10qbit.com/'

// export const record_types_with_description = [
//   { name: 'Notes', value: 'NOTES', errors: [],
//     description: [{ key: 'Title', value: '' }, { key: 'Description', value: '' } ]
//   },
//   { name: 'Prescriptions', value: 'PRESCRIPTIONS', errors: [],
//     description: [{ key: 'Title', value: '' }, { key: 'Description', value: '' } ]
//   },
//   { name: 'Allergy', value: 'ALLERGY', errors: [],
//     description: [ { key: 'Description', value: '' } ]
//   },
//   { name: 'Medications', value: 'MEDICATIONS', errors: [],
//     description: [ { key: 'Description', value: '' } ]
//   },
//   { name: 'Surgical history', value: 'SURGICAL_HISTORY', errors: [],
//     description: [ { key: 'Description', value: '' } ]
//   },
//   { name: 'Medical history', value: 'MEDICAL_HISTORY', errors: [],
//     description: [ { key: 'Description', value: '' } ]
//   },
//   { name: 'Family history', value: 'FAMILY_HISTORY', errors: [],
//     description: [{ key: 'Relationship', value: '' }, { key: 'Condition', value: '' } ]
//   },
//   { name: 'Vaccine', value: 'VACCINE', errors: [],
//     description: [ { key: 'Description', value: '' } ]
//   },
//   { name: 'Measure', value: 'MEASURE', errors: [],
//     description: [{ key: 'Measurement Type', value: '' }, { key: 'Value', value: '' } ]
//   },
// ]

export const record_types = [
  { name: 'All'},
  { name: 'Notes', value: 'NOTES' },
  { name: 'Prescriptions', value: 'PRESCRIPTIONS' },
  { name: 'Allergy', value: 'ALLERGY' },
  { name: 'Medications', value: 'MEDICATIONS' },
  { name: 'Surgical history', value: 'SURGICAL_HISTORY' },
  { name: 'Medical history', value: 'MEDICAL_HISTORY' },
  { name: 'Family history', value: 'FAMILY_HISTORY' },
  { name: 'Vaccine', value: 'VACCINE' },
  { name: 'Measure', value: 'MEASURE' },
]

export const measurement_types = [
  { 'name': 'Weight', 'unit': 'kg' },
  { 'name': 'Waist size', 'unit': 'cm' },
  { 'name': 'Height', 'unit': 'cm' },
  { 'name': 'Temperature', 'unit': '°C' },
  { 'name': 'Blood pressure', 'unit': 'mmHg' },
  { 'name': 'Heart rate', 'unit': 'bpm' },
]

export const week_days =
  [
    { text: 'Monday', value: 'MONDAY' },
    { text: 'Tuesday', value: 'TUESDAY' },
    { text: 'Wednesday', value: 'WEDNESDAY' },
    { text: 'Thursday', value: 'THURSDAY' },
    { text: 'Friday', value: 'FRIDAY' },
    { text: 'Saturday', value: 'SATURDAY' },
    { text: 'Sunday', value: 'SUNDAY' },
  ]

export const consultation_form_types = [
  { name: 'Title', value: 'TITLE' },
  { name: 'Text', value: 'TEXT' },
  { name: 'Number', value: 'NUMBER' },
  { name: 'Textarea', value: 'TEXTAREA' },
  { name: 'Select', value: 'SELECT' },
  { name: 'Questions', value: 'QUESTIONS' },
]

export const student_start_year_list = [
  { name: '2012', value: '2012' },
  { name: '2013', value: '2013' },
  { name: '2014', value: '2014' },
  { name: '2015', value: '2015' },
  { name: '2016', value: '2016' },
  { name: '2017', value: '2017' },
  { name: '2018', value: '2018' },
  { name: '2019', value: '2019' },
  { name: '2020', value: '2020' },
  { name: '2021', value: '2021' },
  { name: '2022', value: '2022' },
  { name: '2023', value: '2023' },
]

export const student_end_year_list = [
  { name: '2012', value: '2012' },
  { name: '2013', value: '2013' },
  { name: '2014', value: '2014' },
  { name: '2015', value: '2015' },
  { name: '2016', value: '2016' },
  { name: '2017', value: '2017' },
  { name: '2018', value: '2018' },
  { name: '2019', value: '2019' },
  { name: '2020', value: '2020' },
  { name: '2021', value: '2021' },
  { name: '2022', value: '2022' },
  { name: '2023', value: '2023' },
  { name: '2024', value: '2024' },
  { name: '2025', value: '2025' },
  { name: '2026', value: '2026' },
  { name: '2027', value: '2027' },
  { name: '2028', value: '2028' },
  { name: '2029', value: '2029' },
  { name: '2030', value: '2030' },
  { name: '2031', value: '2031' },
]

export const goal_types = [
  { name: 'become a UI/UX Designer', value: 'become a UI/UX Designer' },
  { name: 'become a Software Engineer', value: 'become a Software Engineer' },
]

export const state_with_colors = [
  { state: 'active', color: 'primary' },
  { state: 'inactive', color: 'danger' },
]

export const applicant_state_with_colors = [
  { state: 'applied', color: 'primary' },
  { state: 'canceled', color: 'danger' },
]

export const job_state_list = [
  { name: 'Active', value: 'active' },
  { name: 'Inactive', value: 'inactive' },
]
