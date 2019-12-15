import request from '@/js/utils/request'

export function getCategories() {
  return request({
    url: '/categories',
    method: 'get'
  })
}

export function getCategory(id) {
  return request({
    url: `/categories/${id}`,
    method: 'get'
  })
}
