import request from '@/js/utils/request'

export function getLanding() {
  return request({ url: '/landing', method: 'get' })
}

