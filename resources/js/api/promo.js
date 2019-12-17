import request from '@/js/utils/request'

export function getPromos() {
  return request({
    url: '/promos',
    method: 'get'
  })
}

