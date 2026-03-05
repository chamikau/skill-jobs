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

export const state_with_colors = [
  { state: 'active', color: 'primary' },
  { state: 'inactive', color: 'danger' },
]

export const job_state_list = [
  { name: 'Active', value: 'active' },
  { name: 'Inactive', value: 'inactive' },
]

export const job_location_type = [
  { name: 'Hybrid', value: 'Hybrid' },
  { name: 'Remote', value: 'Remote' },
]
