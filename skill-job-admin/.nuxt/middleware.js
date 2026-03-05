const middleware = {}

middleware['organizationChecker'] = require('..\\middleware\\organizationChecker.js')
middleware['organizationChecker'] = middleware['organizationChecker'].default || middleware['organizationChecker']

export default middleware
