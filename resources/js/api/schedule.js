import request from '@/js/utils/request'

const base = 'https://webws.365scores.com/web'

export function getGames(langId = 1, startDate = '16/12/2019', endDate = '16/12/2019') {
  return request({
    url: `http://localhost:8080/${base}/games/?langId=${langId}&timezoneName=Asia/Baghdad&userCountryId=-1&appTypeId=5&sports=1&startDate=${startDate}&endDate=${endDate}`,
    method: 'get'
  })
}

export function getGame(langId = 1, gameId) {
  return request({
    url: `http://localhost:8080/${base}/game/?langId=${langId}&timezoneName=Asia/Baghdad&userCountryId=-1&appTypeId=5&gameId=${gameId}`,
    method: 'get'
  })
}
