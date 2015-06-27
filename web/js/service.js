shopModule.factory("productService", ["$resource", function ($resource) {
    return $resource(
        "/web/ajax/product",
        {},
        {
            "find": { method: "GET", params: {}},
        }
    );
}]);