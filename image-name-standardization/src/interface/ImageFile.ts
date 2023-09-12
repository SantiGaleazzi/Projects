export interface ImageFile {
  id: number,
  name: string,
  previewImage: string,
  size: string,
  project: string,
  description: string,
  newFile?: File | Blob,
  oldFile?: File
}