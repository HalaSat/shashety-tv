import request from '@/js/utils/request'

export function getHomePromo() {
  return request({ url: '/home_promo', method: 'get' })
}

