import request from '@/js/utils/request'

export function getVotePost() {
  return request({
    url: '/vote_posts',
    method: 'get'
  })
}


export function newVote(data) {
  return request({
    url: '/votes',
    method: 'post',
    data
  })
}

