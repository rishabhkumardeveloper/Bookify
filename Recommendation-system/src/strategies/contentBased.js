import { getCosineSimilarityRowVector, sortByScore, getMovieIndexByTitle } from './common';

function predictWithContentBased(X, MOVIES_IN_LIST, title) {
  const { index } = getMovieIndexByTitle(MOVIES_IN_LIST, title);
  const cosineSimilarityRowVector = getCosineSimilarityRowVector(X, index)
  const contentBasedRecommendation = cosineSimilarityRowVector
    .map((value, key) => ({
      score: value,
      movieId: MOVIES_IN_LIST[key].id,
    }));

  return sortByScore(contentBasedRecommendation);
}

export default predictWithContentBased;