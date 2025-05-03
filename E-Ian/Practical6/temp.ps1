$target = "$env:windir\Temp\"
$dir = Get-ChildItem $target -Recurse 
$list = $dir | Where-Object { $_.Extension -eq ".tmp" }

$count = 0
$outputFile = "tmpFileNames.txt"

# Clear or create the output file
Out-File -FilePath $outputFile -Force

foreach ($_ in $list) {
    $_.Name | Out-File -FilePath $outputFile -Append
    $count = $count + 1
}

"Number of files: $count"