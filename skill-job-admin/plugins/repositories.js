import createRepository from '~/src/repositories/Repository'

export default (ctx, inject) => {
  inject('repositories', createRepository(ctx.$axios))
}
